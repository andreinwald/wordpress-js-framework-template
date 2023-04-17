# Skeleton for creating Wordpress template using modern JS frameworks like React, Vue, Angular
- Installation
- Problems with Javascript in wordpress plugins
- How to use Contact Form 7 plugin

# Installation
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
# Make sure that you running npm/npx/yarn commands in your theme folder, not in wordpress root one.
npm run build
```

5. Choose your new theme in Wordpress admin panel (Appearance -> Themes)

**Thats it! Now you can open your wordpress site and see JS Framework page!**

# Problems with Javascript in wordpress plugins
Long time ago wordpress was designed by old style backend HTML compositing. Thats why a lot of wordpress plugins expect, that it will be only one set of html on page, and adds their listeners after **DOMContentLoaded** event.
So, if you use React/Vue/other SPA framework, new parts of HTML and page content can not work properly sometimes.
What to do with that?
1. Find javascript source code of target plugin. Most of them are open.
2. Look at init actions that written on events DOMContentLoaded, $(document).ready(), window.onload
3. Call theese actions after target JSX or any dynemic html rendered
example is below:

# How to use Contact Form 7 plugin
If you face with javascript problems with some plugins, then you shoud init their methods by yourself.
1. Source code of this plugin on Github https://github.com/takayukister/contact-form-7
2. We can find js file that listen DOMContentLoaded and do init https://github.com/takayukister/contact-form-7/blob/master/includes/js/src/index.js
```javascript
document.addEventListener( 'DOMContentLoaded', event => {
  ...
  document.querySelectorAll(
		'.wpcf7 > form'          // As you see it looks for rendered html elements with this class
	).forEach( form => {
		wpcf7.init( form );
		form.closest( '.wpcf7' ).classList.replace( 'no-js', 'js' );
	});
});
```
3. So after rendering your React/Vue/other SPA framework page you just need to call this init code again:
```javascript
// React example
function SomeComponent() {
    useEffect(() => {
        document.querySelectorAll(
            '.wpcf7 > form'
        ).forEach(form => {
            window.wpcf7.init(form);
            form.closest('.wpcf7').classList.replace('no-js', 'js');
        });
    }, []);
    
    // JSX code
}
```




