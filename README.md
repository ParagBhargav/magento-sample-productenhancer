# Sample Product Enhancer Module
A Magento 2 module that tracks product views and displays view statistics in the admin panel.

## Features
- Tracks product view counts and last viewed timestamps
- Custom admin grid showing product view statistics
- System configuration to enable/disable tracking
- Displays view count message on product pages
- Responsive and clean UI for both frontend and admin

## Installation

1. Clone this repository or download the zip file
2. Create directory app/code/Sample/ProductEnhancer
3. Copy all files to the created directory
4. Run setup commands:
```
  php bin/magento setup:upgrade
  php bin/magento setup:di:compile
  php bin/magento setup:static-content:deploy -f
  php bin/magento cache:clean
```
Configuration
1. Go to Stores → Configuration → Sample → Product Enhancer
2. Enable/disable the module
3. Set the display text for product pages
4. Save configuration
	
## Usage

### Admin Panel
<p>Navigate to Catalog → Product Enhancer → Product View Log</p>
<p>View product statistics including:</p>
<ul>
  <li>Product ID</li>
  <li>View Count</li>
  <li>Last Viewed At</li>
</ul> 
<p>Delete individual records</p>

### Frontend
    View counts are displayed below product price on product pages
    Format: "[Configured Text] X times"
    
## Uninstallation
```
php bin/magento module:disable Sample_ProductEnhancer
php bin/magento setup:upgrade
php bin/magento setup:di:compile
```
