# xlsimport

## Symfony 4 + Doctrine

### Import aus XLS Datei

```
curl http://localhost:8000/api/import/ -i -F "file=@source.xls"
```

### DB Abfrage um Einträge für Kategorie auszuwählen

```
SELECT c.* FROM companies AS c WHERE FIND_IN_SET('3', c.categories)
```

### Anmerkungen
src/includes/categories.json - Kategorien Mapping

in das Feld companies.categories werden Kategorien aus XSL importiert + alle entsprechende Elternkategorien aus .json Datei
