https://chatgpt.com/c/66e9d6c9-79ac-8005-bfc5-fb51ebc3ebbd

# include-combinator

Combindes multiple includes, files and remote links into one file. 

- Inspired a bit by Adminer (adminer.org)
- Kind of a simpler-to-use, more flexible Composer in PHP

## Benefits
- Pull in commonly used code snippets in an easy-to-manage way
- Helpful for building via DRY (do not repeat yourself) and atomic principles

## Ideas for alternate name for Inclusion ... 
- Conductor
- Maestro
- Baton - passing the paton, also because of running

## Why Atomic 🤷‍♂️
Writing a large number of functions to one file might initially feel efficient, especially if you group them into a file with related functions like "time" but then you move on to another project and realize you need to do lots of the same basic stuff but all the stuff from previous projects is buried in long files and it takes quite a bit of time to pull out the bits you need. 

It gets even worse if you have many projects and you've been using the all-functions-to-one-file method for each of them and they all use different variants of the same function and you're not sure which variant is best and again waste lots of time trying to look through and find what you need. 

A better way: Just put each function into its own file. It will live here like a lego block that does one thing and hopefully does it well! It takes some input and returns some output. 

With this include method, using the code here, you can include this lego block in hundreds of projects and if you make a refinement to the way this one lego block works you can update it in this one place and all your hundreds of projects can immediately benefit from this without needing to evaluate the update within the context of each program. 

I used to think that there would be some serious performance loss to including so many files within an app but I've found that the main thing that slows wep apps down are http calls, especially to many domains, and including many files on the same server with includes is still pretty fast. Plus, if you wish, you can use this method during development and then use a function merge tool to combine the functions for production use. 

## Impact of AI 🤖
I started using this method before AI came on to the seem and it's true that sometimes, now, it's easier to just ask AI to write out something to solve an issue you're having and allow it to choose the functions and I am, as a result, refining my little garden of key functions less but I still believe in this method. 

I am also working to see if I can teach my AI all about the functions I use and that are already stored in my garden and tell it to just use these when it can and to improve these functions as well. If I can get this to go it will still mean the tools I use will be easier to use and maintain. 

## How 📋
Just include the file somehow in your project
```php
require('surgo_atomic_includes.php');  
```

And then go for it with something like this 
```php
$incs = 	
array(
	'api_requests',  // Annotation about this .. 
	'surgo_table_td',	
	'surgo_table_css_1',
	'pretty_array',
	'surgo_inputs',
	'time_ago',
	'time_ago2',
	'time_test',
	'debug'
);
surgo_include('path/to/my/snippets',$incs);
```

Since this is often used in development it can also output a html look at the includes being used in an app at the top, like seeing all the pieces of the building block. 


## Initial version

FEATURE: Combination 
Just want to be able to combined includes into one file that can be executed just the same and preserved everything. 

OB_FLUSH ISSUE:
Tried using ob_flush but this executed the PHP in the includes and for this purpose I needed it to just treat it as text. SOLUTION: This was helpful solution and get approach: https://stackoverflow.com/questions/25429051/combine-multiple-php-files-into-one

FEATURE: Execution flexibility
-Need these files to be able to be executed as includes OR when combined. 
-Because of this you need to keep the initial "<?php" in the includes which leads to an issue at combination, currently solved below. 

INITIAL "<?php" ISSUE: 
Right now we're just deleting the first line but this could be a problem if anyone else ever would want to try this. It really should look for "<?" Or <?php" in first few lines or within initial characters and remove, if present. 


FUTURE FEATURES:

SCAN DIRECTORY: 
-Would be goo to manually just scan a directory to get the includes names so you don't have to do it manually
-Should experiment with how the files are organized, maybe putting this all into a function so it hides away and can just be dropped in easily into any plugin or app. This was all done very quickly in an hour from 11:30am to 12:20p on Saturday September 11, 2021 -- 20 years on!


