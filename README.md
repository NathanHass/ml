# Muzzy Lane Wordpress Theme

## Getting Started

### Running Wordpress Locally
There are several ways you can run Wordpress locally. I used [VVV](https://github.com/Varying-Vagrant-Vagrants/VVV) to set up my local environment. 

VVV requires recent versions of both Vagrant and VirtualBox to be installed.

Vagrant is a “tool for building and distributing development environments”. It works with virtualization software such as VirtualBox to provide a virtual machine sandboxed from your local environment.

To set up configure a local environment with VVV, follow [these instructions](https://github.com/Varying-Vagrant-Vagrants/VVV#the-first-vagrant-up).

### Front End Dependencies
First, make sure you have node installed. Node is a javascript application that serves as the backbone for bower (among other things). [Download the installer](http://nodejs.org/download/) for your operating system.

Next, install [Bower](http://bower.io/). Bower is a package manager for front end dependencies. `npm install -g bower`

Next, install [Gulp](http://gulpjs.com/). This is used to compile the project’s SCSS. `npm install —global gulp`

Finally, open a terminal, navigate to your Muzzy Lane theme folder, and run the following commands. These:

```
$ bower install
$ npm install
$ gulp watch
```

## Timber
Timber helps you create fully-customized WordPress themes faster with more sustainable code. With Timber, you write your HTML using the [Twig Template Engine](http://twig.sensiolabs.org/) separate from your PHP files. 

Continued development of this site will require a familiarity with [Timber](https://github.com/jarednova/timber), [Advanced Custom Fields (ACF)](http://www.advancedcustomfields.com/resources/), and the way they [work together](https://github.com/jarednova/timber/wiki/ACF-Cookbook). Jared Novak, creator of Timber, has done a far better job than I could do documenting the intricacies of Timber, so I will link to his [docs](https://github.com/jarednova/timber/wiki) where appropriate. 

### Making New Pages
#### Custom Twig File

Say you've created a page called “Authors” and WordPress has given it the slug `authors`.

- Create a file called page-authors.twig inside your views and go crazy.
- I recommend copying-and-pasting the contents of [page.twig](https://github.com/NathanHass/ml/blob/master/views/page.twig) into here so you have something to work from.

#### Custom PHP Files
If you need to do something special for this page in PHP, you can use standard [WordPress template hierarchy](https://developer.wordpress.org/themes/basics/template-hierarchy/) to gather and manipulate data for this page. In the above example, you would create a file called `/wp-content/themes/ml/page-authors.php` and populate it with the necessary PHP. Again, you can use the contents of the starter theme's [page.php](https://github.com/NathanHass/ml/blob/master/page.php) file as a guide.
