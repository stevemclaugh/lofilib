# lofilib

Setup steps:

- Create metadata DB and load CSV.

Create books table:

```
CREATE TABLE IF NOT EXISTS books (
  `book_id` CHAR(32) NOT NULL,
  `year` CHAR(16) NULL DEFAULT NULL,
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



CREATE TABLE IF NOT EXISTS users (
  `user_id` CHAR(32) NOT NULL,
  `username` CHAR(32) NULL DEFAULT NULL,
  `date_joined` CHAR(32) NULL DEFAULT NULL,
  `password` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`));


INSERT INTO users
(user_id, username, date_joined, passwrod)
VALUES
('9', 'steve', '1524004835', 'password');


CREATE TABLE IF NOT EXISTS ratings (
  `book_id` CHAR(32) NOT NULL,
  `user_id` CHAR(32) NOT NULL,
  `rating` SMALLINT NOT NULL);



CREATE TABLE IF NOT EXISTS full_text (
  `book_id` CHAR(32) NOT NULL,
  `text` MEDIUMTEXT,
  PRIMARY KEY (`book_id`));

```






Use mysqlimport to load a table into the database:

```
mysqlimport --ignore-lines=1 \
            --fields-terminated-by=, \
            --fields-optionally-enclosed-by="\"" \
            --local -u srm3536 \
            -p \
            lofilib \
            books.csv
```


`books.csv` contains basic metadata for each book in the collection.


```
mysqlimport --ignore-lines=1 \
            --fields-terminated-by=, \
            --fields-optionally-enclosed-by="\"" \
            --local -u srm3536 \
            -p \
            lofilib \
            full_text.csv
```


>> To make the delimiter a tab instead, use the option `--fields-terminated-by='\t'`

<!--
From http://chriseiffel.com/everything-linux/how-to-import-a-large-csv-file-to-mysql/
https://stackoverflow.com/questions/3635166/how-to-import-csv-file-to-mysql-table
-->


## Metadata Fields

```
book_id,author_id,filename,title,authors,isbn,pages,publisher,language,description,keywords,pub_type,cover_image
```

GitHub page: [https://github.com/stevemclaugh/lofilib](https://github.com/stevemclaugh/lofilib)


How to access the page for a particular book:
- [https://aura.ischool.utexas.edu/~srm3536/lofilib-master/book.php?id=a39cda0c7e7fce1128a02f3ce914b6da](https://aura.ischool.utexas.edu/~srm3536/lofilib-master/book.php?id=a39cda0c7e7fce1128a02f3ce914b6da)

Here’s how to search by title:
- [https://aura.ischool.utexas.edu/~srm3536/lofilib-master/search.php?title=Death](https://aura.ischool.utexas.edu/~srm3536/lofilib-master/search.php?title=Death)
