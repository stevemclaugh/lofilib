# lofilib

Clean DOAB table.



Create DB and load CSV.

Use mysqlimport to load a table into the database:

```
mysqlimport --ignore-lines=1 \
            --fields-terminated-by=, \
            --local -u root \
            -p Database \
             TableName.csv
```

I found it at http://chriseiffel.com/everything-linux/how-to-import-a-large-csv-file-to-mysql/

To make the delimiter a tab, use --fields-terminated-by='\t'

# https://stackoverflow.com/questions/3635166/how-to-import-csv-file-to-mysql-table

