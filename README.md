## Lemonade Wordpress Starter Theme  
Based on [Automattic's underscores](http://underscores.me/) starter Theme


This is a work in progress!
_I will continue to refine this starter until it fits my general needs._

Theme Directory Structure
- `Singular.php` can be used to replace `single.php` and `page.php`, reducing the number of pages used in the theme
- Partials contain blocks of reusable code that is called into each template file.
- `Functions.php` includes google fonts enqueue scripts
- Components include various template pages that can be added to the theme to enhance and build on the minimal original components
---

Renaming (instructions snatched from underscores.me)
1. Search for `'_lemonade'` (inside single quotations) to capture the text domain.
2. Search for `_lemonade_` to capture all the function names.
3. Search for `Text Domain: _lemonade` in style.css.
4. Search for `<code>&nbsp;_lemonade</code>` (with a space before it) to capture DocBlocks.
5. Search for `_lemonade-` to capture prefixed handles.
