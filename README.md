# Skeleton for creating Wordpress template using modern JS frameworks like React, Vue, Angular

## Installation
1. Download Wodpress code from site or install via docker

2. Create frontend app in themes folder
```shell
cd wp-content/themes

# Create regular frontend repo - it will be as one of themes
npx create-react-app react-theme
# or
vue create vue-theme
```
3. Copy files index.php and style.css from this repo to your theme folder (react-theme)

4. Build everything to build folder
```shell
npm run build
```

5. Choose your new theme in Wordpress admin panel (Appearance -> Themes)

**Thats it! Now you can open your wordpress site and see JS Framework page!**
