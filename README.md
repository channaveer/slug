##About Simple Slug Generator

Hi with the help of this page you can generate simple Slug

##Working Basic Example To Generate Slug

```php
<?php
require_once './vendor/autoload.php';

use Channaveer\Slug\Slug;

$string = "How To Create A Composer Package? Test It Locally And Add To Packagist Repository";

echo Slug::create($string);

```

##Generate UNIQUE Slugs Example

```php
<?php
require_once './vendor/autoload.php';

use Channaveer\Slug\Slug;

$title  = "How To Create A Composer Package? Test It Locally And Add To Packagist Repository";

$slug   = Slug::create($title);

/** Following is the simple PDO Query to check the 
 * total number of blog with similar slug name  */
$blog_count_stmt = $pdo->prepare("
                    SELECT
                        COUNT(`id`) slug_count
                    FROM
                        `articles`
                    WHERE
                        `slug` LIKE :slug
                ");

$blog_count_stmt->execute([
    ":slug" => "%".$slug."%"
]);

$blog_count = $blog_count_stmt->fetchObject();

if ($blog_count && $blog_count->slug_count > 0) {
    $article_increment = $blog_count->slug_count + 1;
    $slug = $slug . '-' . $article_increment;
}

echo 'Your unique slug - <br/>'. $slug;
```