<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Base Template with Built-in Features</h1>
    <br>
</p>

I've crafted this template to streamline web application development, integrating essential features to accelerate your workflow. Among its key functionalities is seamless integration with Webvimark RBAC, serving as a module for effortless role and permission management.

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-basic.svg)](https://packagist.org/packages/yiisoft/yii2-app-basic)
[![build](https://github.com/yiisoft/yii2-app-basic/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-basic/actions?query=workflow%3Abuild)

KEY FEATURE
-------------------

- Webvimark RBAC Module: Seamlessly integrated module for role and permission management, courtesy of Webvimark RBAC.
- Enhanced Gii Template: Leveraging the Enchanted Gii library from Mootensai, I've refined and expanded Gii's functionality for easier use and enhanced productivity.
- Kartik Library Additions: I've incorporated various enhancements and UI components from the Kartik library to enrich user experience.
- Bootstrap 4 Integration: This application embraces Bootstrap 4, providing a modern and responsive layout design.
- Additional CSS Configurations: I've included supplementary CSS configurations inspired by Bootstrap 3 in separate files to extend design functionality.

OLD DIRECTORY STRUCTURE:
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


NEW DIRECTORY STRUCTURE:
-------------------
    .
    ├───index.php        
    ├───assets                
    ├───css
    ├───fonts
    ├───img
    ├───vendor
    └───app
        ├───assets
        ├───commands
        ├───config
        ├───controllers
        ├───gii
        ├───mail
        │   └───layouts
        ├───models
        │   └───base
        ├───modules         
        │   └───usermanagement
        │       ├───controllers
        │       ├───migrations
        │       ├───models
        │       │   ├───forms
        │       │   ├───rbacDB
        │       │   └───search
        │       ├───views
        │       │   ├───auth
        │       │   ├───auth-item-group
        │       │   ├───layouts
        │       │   ├───mail
        │       │   ├───permission
        │       │   ├───role
        │       │   ├───user
        │       │   ├───user-permission
        │       │   └───user-visit-log
        │       ├───components
        │       │   ├───basecomponents
        │       │   └───widgets
        │       ├───helpers
        │       └───extensions
        │           ├───image
        │           ├───GridPageSize
        │           ├───BootstrapSwitch
        │           ├───GridBulkActions
        │           ├───DateRangePicker
        │           └───ikimea
        ├───runtime
        ├───tests
        ├───views
        └───widgets


REQUIREMENTS
------------
The minimum requirement by this project template that your Web server supports PHP 7.4.


GETTING STARTED
------------
Clone this repository to your local machine.
Install dependencies using composer update.
Configure your database connection in the config/db.php file.
Access the application through your web browser.

MIGRATION USER MANAGEMENT
------------
Quick Steps:
1. Migration Code:
   ```
   ./yii migrate --migrationPath=app/modules/usermanagement/migrations
   ```
2. Brief Explanation:
   
   Run the above command in your Yii2 project terminal.
   This will initiate migration specifically for the Webvimark User Management module.

CONTRIBUTIONS
------------
Feel free to contribute by submitting pull requests for fixes, enhancements, or new features.

Notes:
    Make sure to refer to the user guide and documentation for each feature provided.
