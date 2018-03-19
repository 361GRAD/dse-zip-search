361 Grad Digital GmbH - Zip-Search

For the moment we use our elements as single bundles.
Later we will use the dse-elements-bundle as metapackage
to implement all elements at once.

Description:
zip search element

Installation:

! Be sure you have access to gitlab via ssh or accesstoken !


1. Edit the contao composer.json and add these lines
```
"repositories": [
        {
            "type": "vcs",
            "url": "git@gitlab.com:361GRAD-Elements/default/dse-zip-search.git"
        }
],
```

2. On the cli enter and install via composer
```
composer require 361GRAD-Elements/dse-zip-search
```

3. Go to the install.php and update db


4. Done
