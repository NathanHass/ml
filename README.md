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

