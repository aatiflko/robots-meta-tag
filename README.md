“Neo-Robots Meta Tag” extension
=====================
Magento 2 "Robots Meta Tag" extension add a feature which allow admin to add robot meta tag dynamically to category and product from admin panel.

## INSTALLATION

### COMPOSER INSTALLATION
* run composer command:
>`$> composer config repositories.reponame vcs https://github.com/aatiflko/robots-meta-tag`

>`$> composer require aatiflko/robots-meta-tag`

### MANUAL INSTALLATION
* extract files from an archive

* deploy files into Magento2 folder `app/code/Neo/RobotsMetaTag`

### ENABLE EXTENSION
* enable extension (use Magento 2 command line interface \*):
>`$> php bin/magento module:enable Neo_RobotsMetaTag`

* to make sure that the enabled module is properly registered, run 'setup:upgrade':
>`$> php bin/magento setup:upgrade`

* [if needed] re-compile code and re-deploy static view files:
>`$> php bin/magento setup:di:compile`
>`$> php bin/magento setup:static-content:deploy`


## HOW TO USE IT:
* Step 1: Login to admin panel
* To add robot meta tag for product navigate to Catalog => product and click on "Add Product" button or edit existing product. On product form click on the "Search Engine Optimization" tab and select the option from the "Search Engine Robots" dropdown.

* To add robot meta tag for category navigate to Catalog => category. On category form click on the "Search Engine Optimization" tab and select the option from the "Search Engine Robots" dropdown.

* To set default robots meta tag for product and category navigate to Store => Configuration. At the configuration page search for the "Neo" tab. Under the tab click on "Neosoft Robots Meta Tag settings" and select the meta tag option, these tags will appear as default if the option is not selected specifically for the product and category.

Enjoy!

Best regards,
Neosoft Technologies

-------------