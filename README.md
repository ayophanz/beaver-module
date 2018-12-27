# beaver-module
beaver builder theme modules is a plugin for wordpress that I created to extend the capabilities of free beaver builder module lite plugin


WHY MODULES:

There are lots js libraries available on internet most of them open-source like (owl-carousel).
Try to imagine you have a big project and you have multiple carousel on it you can do a procedural way, its fine what if your carousel encounter bugs so you need to review all of the carousel you implemented one by one which is not good it takes time and hard to manage. In beaver modules you can integrate owl-carousel to became part of your module the good thing is you can easily locate, manage and debug the code or even other programmer, the very best thing is you can reuse it to any of your wordpress project.


MODULES LOCATION:

Under the modules > theme folder you can view a lots of modules that you can reuse to any of your wordpress projects like carousel,
of course we can create fresh modules, this kind of modules is easy to maintain and debug by other programmer because the files is easy to locate, the name  of modules in frontend is the name of modules folder.


MODULES CODE STYLE:

It is Object Oriented Implementation to make it more organize and easy to understand, I created different files and folder.

1. modules folder:

    carousel (parent folder)
  
    css (child folder)
    
    includes (child folder)
    
    config file (php file)
    
2. css folder:

    frontend.css - The appearance of the module in your frontend so it easy to style or update the css of every module

3. includes folder:  
  
   frontend.css.php - In most of my modules we can set css without opening the css file, this file is responsible of queck styling for common css properties like margin and padding.
   
   frontend.js.php - Same as frontend.css.ph but this file handles the javascript properties like animation making output animated whatever we want like left to right or top to bottom.
   
   frontend.php - This file handles the configuration that you've made on module like archor(<a></a>) on click new tab or same tab 

4. nameofmodules.php example carousel.php :

    This file is the main file of the module where you can register settings on your modules like we want input field for title text and it compose of multiple arrays for easy calling and readable variable code like this ( $settings->items[$i]->carousel_linkto )




Please see one of my modules as example of my coding style:

path:   modules/theme/slider/slider.php

