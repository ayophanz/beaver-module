# beaver-module
beaver builder theme modules is a plugin for wordpress that I created to extend the capabilities of free beaver builder module lite plugin


WHY MODULES:

There are lots js library available on internet most of them open-source like (owl-carousel)
try to imagine you have a big project and you have multiple carousel on it you can do a traditional way its fine what if your carousel encounter bugs so you need to review all of the carousel you implemented one by one which is not good it takes a time and hard to manage, In beaver modules you can integrate owl-carousel to became part of your module the good thing is you can easily locate, manage and debug the code or even other programmer, the very best thing is you can reuse it to any of your wordpress project.


MODULES LOCATION:

Under the modules > theme folder you can view a lots of modules that you can reuse to any of your wordpress projects like carousel,
of course we can create fresh modules, this kind of modules is easy to maintain and debug by other programmer because the files is easy to locate, the name  of modules in frontend is the name of modules folder.


MODULES CODE STYLE:

It is Object Oriented Implementation to make it for organize and easy to understand I created different files and folder.

1. modules folder
example:

  carousel (parent folder)
    css (child folder)
    includes (child folder)
    config file (php file)
    
2. css folder
example:
  frontend.css (the appearance of the module in your frontend so it easy to style or update the css of every module)
