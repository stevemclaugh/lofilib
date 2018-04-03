# lofilib

Clean DOAB table.


Create DB and load CSV.

Create books table:

```
CREATE TABLE IF NOT EXISTS books (
  `book_id` CHAR(32) NOT NULL,
  `author_id` CHAR(32) NULL DEFAULT NULL,
  `filename` VARCHAR(255) NULL DEFAULT NULL,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `authors` VARCHAR(255) NULL DEFAULT NULL,
  `isbn` VARCHAR(31) NULL DEFAULT NULL,
  `pages` INTEGER NULL DEFAULT NULL,
  `publisher` VARCHAR(255) NULL DEFAULT NULL,
  `language` VARCHAR(31) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `keywords` TEXT NULL DEFAULT NULL,
  `pub_type` VARCHAR(255) NULL DEFAULT NULL,
  `cover_image` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`));
```


Use mysqlimport to load a table into the database:

```
mysqlimport --ignore-lines=1 \
            --fields-terminated-by=, \
            --local -u srm3536 \
            -p \
            lofilib \
            books.csv
```



To make the delimiter a tab, use --fields-terminated-by='\t'


<!--

"I found it at http://chriseiffel.com/everything-linux/how-to-import-a-large-csv-file-to-mysql/"

https://stackoverflow.com/questions/3635166/how-to-import-csv-file-to-mysql-table
-->
