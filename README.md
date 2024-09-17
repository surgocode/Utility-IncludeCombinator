# include-combinator

Combindes multiple includes, files and remote links into one file. 

- Inspired a bit by Adminer (adminer.org)
- Kind of a simpler-to-use, more flexible Composer in PHP
- Helpful for building via DRY (do not repeat yourself) and atomic principles


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


