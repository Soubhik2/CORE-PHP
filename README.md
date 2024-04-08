
# 🌌CORE-PHP 

#### *🚀  This is CORE PHP custom framework.*



## 🧠 Authors

- [@Soubhik2](https://github.com/Soubhik2/CORE-PHP)

## 📀 Used technology 
<div align="left">
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40" alt="react logo"  />
  <img width="12" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" height="40" alt="bootstrap logo"  />
</div>

## 🛠️ Installation Steps

*Please download this file and save it in the 'htdocs' folder of your XAMPP installation.*

### Then change `CPHP` to your 📁 `{folder}` name.

#### This is in your project folder first 📄 `.htaccess` file.
```
Options -Indexes

RewriteEngine On
RewriteBase /CPHP/ <--- change here
RewriteRule ^index\\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /CPHP/index.php [L] <--- change here
```

#### for project deploy

```
Options -Indexes

RewriteEngine On
RewriteBase /
RewriteRule ^index\\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.php [L]
```

#### And now change on 📄 `index.php`.
```php
$pass_url = 'CPHP';
```
### Now run your project.
[http://localhost/CPHP/](http://localhost/CPHP/) <--- change this to your file name

## 💲 Environment Variables

`BASEPATH`
`BASEURL`
`$request`
`$requests`
`$viewDir`
`$pass_url`

#### Those are very important variables.

## 📝 Documentation

### 🚀 How to use ?

- [Configuration](#Configuration)
- [Views](#Views)
- [Routers](#Routers)
- [Database](#Database)
- [Input](#Input)
- [Session](#Session)
- [Authentication](#Authentication)

### 🔻 <span id="Configuration">Configuration</span>

You can locate it in the 📄 config.php file of your project's 📁 app/config folder.

**⚪ router configuration**

You can configure your router here

```php
// AUTO, MANUAL (recommend)
$router = "AUTO";
$default_page = "welcome";
```
`AUTO` is used for file base routing. <br>
`MANUAL` is used for routing path manually.<br>
`$default_page` is used for set default page for `AUTO` routing

**⚪ development configuration**

```php
// development, deploy
$project = "development";
```
`development` is for show errors and warnings. <br>
`deploy` is for hide errors and warnings.

### 🔻 <span id="Views">Views</span>

**You can locate it in the 📁 app/views folder.<br>
Here you can add you views files like `welcome.php`**

### 🔻 <span id="Routers">Routers</span>

You can locate it in the 📄 routes.php file of your project's 📁 app/config folder.

This is a very basic index routing,
```php 
$routes['/'] = 'welcome'; 
```

**syntax**
```php 
$routes['{path}'] = '{file_name}'; 
```
It's get 📄 file from 📁 app/views folder

__Dynamic paths__
```php
$routes['/test/:any'] = 'test/$value';
$routes['/admin/:num'] = 'admin/$id';
```
`:any` -> for any `var` like `char`, `string`, `number` etc. <br>
`:num` -> for `number` only. <br>
**note:** `:any` support multiple paths like this -> `$routes['/test/:any'] = 'test/$value/$id'`

**syntax**

```php
// $routes['/test/:any'] = 'test/{your_variable}';
$routes['/test/:any'] = 'test/$value';
```

for get data use this `$value` to you php code 🔻.
```php
//exmple
<?php
    echo $value;
?>
```

### 🔻 <span id="Database">Database</span>

You can locate it in the 📄 database.php file of your project's 📁 app/config folder.

**Configure your database here.**
```php
$database["host"] = '{localhost}';
$database["username"] = '{user_name}';
$database["password"] = '{password}';
$database["database"] = '{database_name}';
```

This framework use `$database` object but it also support `$conn` OOPS `mysqli`

**So you can also use 🔻**
```php
$sql = "SELECT * FROM student";
$result = $conn->query($sql);
```

This framework hava `$database` object and query builder classes for easy usage

#### 🚀 How to use `$database`, `CRUD` ?

- [SELECT](#SELECT)
- [INSERT](#INSERT)
- [UPDATE](#UPDATE)
- [DELETE](#DELETE)

**<span id="SELECT">SELECT Data from Database</span>**

```php
// 1. mysqli example
$sql = "SELECT * FROM mytable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<pre>';
        print_r($row);
        echo '</pre>';
    }
} else {
    echo "0 results";
}


//2. Our $database object
$sql = "SELECT * FROM mytable";
$result = $database->query($sql)->result(); // It's return as a array of objects
```
**Query Builder Class**

- [Selecting Data](#Selecting_Data)
- [Looking for Specific Data](#Looking_for_Specific_Data)
- [Looking for Similar Data](#Looking_for_Similar_Data)
- [Counting and Results](#Counting_and_Results)
- [Inserting Data](#Inserting_Data)
- [Updating Data](#Updating_Data)
- [Deleting Data](#Deleting_Data)

Our `$database` object hava also support's `Query Builder Class`

**🔻 <span id="Selecting_Data">Selecting Data</span>**

The following functions allow you to build SQL SELECT statements.<br>
`$database->get();` 

Runs the selection query and returns the result. Can be used by itself to retrieve all records from a table:
```php
$query = $database->get('mytable'); // Produces: SELECT * FROM mytable
```
The second and third parameters enable you to set a limit and offset clause:

```php
$query = $database->get('mytable', 10, 20);

// Executes: SELECT * FROM mytable LIMIT 20, 10
// (in MySQL. Other databases have slightly different syntax)
```

You’ll notice that the above function is assigned to a variable named $query, which can be used to show the results:
```php
$query = $this->db->get('mytable');

foreach ($query->result() as $row)
{
    echo $row->title;
}
print_r('error: '.$database->error()); // show errors
```

**🔻 <span id="Looking_for_Specific_Data">Looking for Specific Data</span>**

`$database->where()`

This function enables you to set WHERE clauses using one of four methods:

**1. Simple key/value method:**

```php
$database->where('name', $name); // Produces: WHERE name = 'Joe'
```
Notice that the equal sign is added for you.

If you use multiple function calls they will be chained together with AND between them:

```php
$database->where('name', $name);
$database->where('title', $title);
$database->where('status', $status);
// WHERE name = 'Joe' AND title = 'boss' AND status = 'active'
```

**2. Custom key/value method:**

```php
$database->where('name !=', $name);
$database->where('id <', $id); // Produces: WHERE name != 'Joe' AND id < 45
```

`$database->or_where()`

This function is identical to the one above, except that multiple instances are joined by OR:

```php
$database->where('name !=', $name);
$database->or_where('id >', $id);  // Produces: WHERE name != 'Joe' OR id > 50
```
**Query grouping**

```php
$database->where('name !=', $name)->or_where('id >', $id);
// Produces: WHERE name != 'Joe' OR id > 50
```

**🔻 <span id="Looking_for_Similar_Data">Looking for Similar Data</span>**

`$database->like()`

This method enables you to generate LIKE clauses, useful for doing searches.

**1. Simple key/value method:**

```php
$database->like('title', 'match');
// Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
```

If you use multiple method calls they will be chained together with AND between them:
```php
$database->like('title', 'match');
$database->like('body', 'match');
// WHERE `title` LIKE '%match%' ESCAPE '!' AND  `body` LIKE '%match% ESCAPE '!'
```

If you want to control where the wildcard (%) is placed, you can use an optional third argument. Your options are ‘before’, ‘after’, ‘none’ and ‘both’ (which is the default).

```php
$database->like('title', 'match', 'before');    // Produces: WHERE `title` LIKE '%match' ESCAPE '!'
$database->like('title', 'match', 'after');     // Produces: WHERE `title` LIKE 'match%' ESCAPE '!'
$database->like('title', 'match', 'none');      // Produces: WHERE `title` LIKE 'match' ESCAPE '!'
$database->like('title', 'match', 'both');      // Produces: WHERE `title` LIKE '%match%' ESCAPE '!'
```

`$database->or_like()`

This method is identical to the one above, except that multiple instances are joined by OR:

```php
$database->like('title', 'match'); $database->or_like('body', $match);
// WHERE `title` LIKE '%match%' ESCAPE '!' OR  `body` LIKE '%match%' ESCAPE '!'
```
**🔻 <span id="Counting_and_Results">Counting and Results</span>**

`$database->get('mytable')->count()`

Permits you to determine the number of rows in a particular Active Record query. Queries will accept Query Builder restrictors such as where(), or_where(), like(), or_like(), etc. Example:
```php
echo $database->get('mytable')->count();  // Produces an integer, like 25
```

1. `$database->get('contact')->result()` It's produces an object
2. `$database->get('contact')->result_array()` It's produces an array
3. `$database->get('contact')->result_json()` It's produces an json

**🔻 <span id="Inserting_Data">Inserting Data</span>**

`$this->db->insert()`

Generates an insert string based on the data you supply, and runs the query. You can either pass an array or an object to the function. Here is an example using an array:

```php
$data = array(
        'title' => 'My title',
        'name' => 'My Name',
        'date' => 'My date'
);

$database->insert('mytable', $data);
// Produces: INSERT INTO mytable (title, name, date) VALUES ('My title', 'My name', 'My date')
```

**🔻 <span id="Updating_Data">Updating Data</span>**

`$database->update()`

Generates an update string and runs the query based on the data you supply. You can pass an **array** or an **object** to the function. Here is an example using an array:

```php
$data = array(
        'title' => $title,
        'name' => $name,
        'date' => $date
);

$database->where('id', $id)->update('mytable', $data);
// Produces:
//
//      UPDATE mytable
//      SET title = '{$title}', name = '{$name}', date = '{$date}'
//      WHERE id = $id
```
**🔻 <span id="Deleting Data">Deleting Data</span>**

`$this->db->delete()`

Generates a delete SQL string and runs the query.

```php
$database->where('id', $id)->delete('mytable');  // Produces: // DELETE FROM mytable WHERE id = $id
```




## 🍰 Features

- Added bootstrap
- Very simple
- Easy to use


![Logo](https://cdn-icons-png.flaticon.com/128/528/528261.png)

<a id="hello"></a>
# Hello

## 🛠️ Installation Steps:
## 🍰 Contribution Guidelines:
## 🛡️ License: 🔻 ♢ ⚪
## 🚀 How to use ? ✔️ 💲

<h1> 
<img src="https://static-00.iconduck.com/assets.00/php-icon-2048x2048-79jhb719.png" height="25" alt="react logo" />
CORE-PHP 
</h1>

You can locate it in the configuration file of your project's app.

