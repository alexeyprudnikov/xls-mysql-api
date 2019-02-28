<?php

namespace App\Controller;

use App\Entity\Category;
use App\Utils\CategoryFactory;
use App\Utils\CompanyFactory;
use App\Utils\SpreadsheetHelper;
use App\Validator\ImportFileValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class ApiController extends AbstractController
{
    protected $categoriesMapper =[];

    protected $categories = __DIR__.'/../includes/categories.json';

    public function __construct()
    {
        try {
            $this->loadCategories();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     *
     */
    public function loadCategories(): void
    {
        $json = file_get_contents($this->categories);
        if($json === false) {
            throw new \RuntimeException('error reading '.$this->categories);
        }
        $this->categoriesMapper = json_decode($json, true);
    }

    /**
     * @Route("/api/import", name="import", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function importXls(Request $request): Response
    {
        $origin = $request->files->get('file');
        try {
            (new ImportFileValidator())->validate($origin);
            $data = (new SpreadsheetHelper($origin))->parse();
            $this->clearData();
            $this->insertCategories();
            $response = $this->insertCompanies($data);
        } catch (\Exception $e) {
            $response = $e->getMessage();
        }
        return new Response(json_encode($response));
    }

    /**
     *
     */
    public function clearData(): void
    {
        $connection = $this->getDoctrine()->getConnection();
        $connection->beginTransaction();
        $connection->query('DELETE FROM data_categories');
        $connection->query('ALTER TABLE data_categories AUTO_INCREMENT = 1');
        $connection->query('DELETE FROM data_companies');
        $connection->query('ALTER TABLE data_companies AUTO_INCREMENT = 1');
    }

    /**
     *
     */
    public function insertCategories(): void
    {
        $entityManager = $this->getDoctrine()->getManager();
        $CategoryFactory = new CategoryFactory();
        foreach ($this->categoriesMapper as $category) {
            $category['parent'] = 0;
            $Category = $CategoryFactory->create($category);
            $entityManager->persist($Category);
            $entityManager->flush();
            if (array_key_exists('children', $category)) {
                $categoryId = $Category->getId();
                foreach ($category['children'] as $childCategory) {
                    $childCategory['parent'] = $categoryId;
                    $ChildCategory = $CategoryFactory->create($childCategory);
                    $entityManager->persist($ChildCategory);
                    $entityManager->flush();
                }
            }
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function insertCompanies(array $data): array
    {
        $entityManager = $this->getDoctrine()->getManager();
        $categoryFinder = $this->getDoctrine()->getRepository(Category::class);
        $CompanyFactory = new CompanyFactory($categoryFinder);
        $total = 0;
        foreach ($data as $companyData) {
            $Company = $CompanyFactory->create($companyData);
            $entityManager->persist($Company);
            $entityManager->flush();
            $total++;
        }
        return ['inserted' => $total];
    }
}
