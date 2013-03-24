title: Laravel: The Bright Future
slug: laravel-the-bright-future
date: 13th September 2012

-----

Laravel 4 has now been in active development for many months, and is finally taking shape as a framework, I feel it's now in a state that we can share some information about what's new and what's exciting.

---more---

However before we get to the features I'd like to take the opportunity to thank <strong>Taylor Otwell</strong> for his hard work. He has been at the keyboard most nights since the project has started, has written several billion (might not be accurate) lines of code to improve the lives of thousands of developers and still doesn't get the credit he deserves for building, in my opinion, one of the greatest PHP frameworks available today.

If you love Laravel, or using it has made your life and work better, or your girlfriend prettier, <a href="mailto:taylorotwell@gmail.com">please send him an email</a>, paypal him a donation at taylorotwell@gmail.com, or just <a title="Taylor Otwell on Twitter" href="https://twitter.com/taylorotwell" target="_blank">say thanks on twitter</a>.

Secondly I'd like to say thanks to Taylor for allowing me to be such a big part of this new project. Over the last year or more many readers of my blog and writings will have noticed that my contributions and involvement with Laravel have become exponentially greater. I enjoy working on a project with such a bright future, and more importantly I have enjoyed becoming friends with Taylor, the Laravel team, and all of the Laravel community.

With Laravel 4, Taylor and I have been in constant discussion about idea's that have helped shape the new Laravel, goals for the framework, tailoring it to suit the needs of our users and in general making the framework extremely pleasing to use.

I have had the honour of contributing some code to the project, prototyping new components, and before long utilizing my passion for design to promote Laravel 4 in the best way possible. Now it's time to take a look at some of changes with Laravel 4.
<h2>Composer</h2>
Laravel 4 is entirely modular, and each module is a composer package. <a href="http://getcomposer.org/" target="_blank">Composer</a> is a software solution, a repository to allow users to share packages of code. These packages can be included as dependencies to the project and downloaded easily via the graceful command line interface that has been provided with the application.

Composer can do many many wonderful things, if you wish to truly embrace Laravel 4 then I suggest taking a look at it's documentation and learn a little about how it works.

So why is this a good thing? There are many reasons.
<h3>Code Re-use &amp; Sharing</h3>
Composer packages don't only benefit users of the Laravel framework, they benefit the entire community. With each component of the framework existing as a separate composer package, you could quite easily pull our wonderful ORM layer 'Eloquent' into your stand alone application without using the entire framework. Of course, we'd love for you to stick with Laravel, but it's great to have options. A good example would be the inclusion of <code>Eloquent</code> to some legacy code you may have to work on.

This benefit can work both ways. Laravel users now have access to the wide range of packages that are already present on packages (composer's main repository). At the time of writing there are <a href="http://packagist.org/statistics" target="_blank">8,647 versions of 3,245 packages of PHP code available on packagist</a>. By comparing this to the 158 packages that are available on the <a href="http://bundles.laravel.com/" target="_blank">Laravel Bundles website</a> it's plain to see that our users will have access to a lot more additional functionality than what the framework offers on it's own, or with a small pool of framework-dependant bundles.
<h3>Class mapping</h3>
In Laravel 3 we had the Autoloader class to simplify the loading of class definitions when they were needed. The Autoloader offered class to file mapping using a number of varying standards, this functionality exists within the Composer application.

By mapping your classes individually, using name-spaces(please do!) or even using an underscored approach, with composer you are able to structure the file-system of the application to suit your needs. You can still follow the traditional app folder approach, which will be set-up for you by default. However for those of you who enjoy more customized work-flows and organization you now have the option!
<h3>Versions &amp; Updating</h3>
Composer allows versioning per package, or per Laravel component. Other packages can then specify specific versions of packages as dependencies. Which brings us to one of my favourite features of the switch to composer.

If you download the Laravel <code>app</code> starter project, and run the <code>composer install</code> command you will be given the latest stable versions of all of the Laravel components, thus building the full framework. But what if we were to update an individual component? With Laravel 3 you would you have to wait for that update to make it into the minor version increment, and then replace the <code>laravel</code> folder, along with any other upgrade instructions.

With Laravel 4 the change will be made to the component git repository, via a service hook packagist will be made aware of the new stable version. Through a simple <code>composer update</code> your Laravel 4 project will be updated to the latest version automatically. This will keep you up to date with feature enhancement, security fixes, and much much more!
<h2>Testing &amp; Legacy Syntax</h2>
Laravel 4 was a real challenge for Taylor. In the previous instalment of Laravel, each component used static methods for clean syntax. Our users are fans of this clean syntax, but the static methods create issues for testing. Modifying instances and mocking can be tricky with these types of classes.

To overcome these problems Laravel's components are instances that exist within the Laravel 4 <code>$app</code> container object. As an example, component methods now look like :

<code>$app['component']-&gt;methodName();</code> with the component accessible as an array index, using the ArrayAccess interface, this could also be accessed as <code>$app-&gt;component-&gt;methodName();</code>.

However this presents a new problem, our code is now less expressive, and would be harder to migrate from previous framework versions. Fortunately Taylor thought of using the Facade structural design pattern to provide short-cuts to these components using syntax that is more familiar. The above component can now be accessed using the Facade <code>Component::methodName();</code> just as with Laravel 3.

Many components have Facades which emulate the syntax found in Laravel 3, which will allow for easy migration to the new framework, while maintaining the testing benefits, since the Facades are simply short-cuts to the instantiated components.

Due the the components, and Laravel 4 code in general being easier to test, Laravel 4 is provided with a complete set of tests for each component. I don't have an exact figure of test coverage to hand, but I would imagine that it's quite high! These test suites, and the fact that each component is tested by Travis CI will lead to improved quality in contributed code. In the future we may ask that pull requests be submitted along with accompanying unit tests.
<h2>Drivers, drivers, drivers.</h2>
Every component that can be driven, or provided alternative functionality has been refactored to use drivers. You may be familiar with drivers from the database layer, providing support for a number of different databases. Well now we have drivers for different methods of rendering views, from standard PHP, to the familiar blade syntax, and now Twig and Markdown! Component drivers are a neat way to allow for very customizable framework, while providing safe defaults. We hope you will enjoy the increased flexibility!
<h2>Profiler</h2>
Time to toot my own horn! The previous version of the profiler included with Laravel 3.2 (originally Anbu) was a huge success and used by many. It was however rushed, unfinished, and had a lot of potential. With Laravel 4 I am working on a new version of the profiler which will provide a lot of useful information, without cluttering, and will be pleasing to look at.

You will soon be able to provide views to the profiler to render your own content within the profiler frame, allowing developers or package authors to extend its functionality from their own applications.
<h2>Code Bright</h2>
I'm currently working on <a href="https://leanpub.com/codebright" target="_blank">Code Bright</a> which will be the successor to my previous title <a href="https://leanpub.com/codehappy" target="_blank">Code Happy</a>, and will provide a great deal of insight into development with Laravel 4.

I am aiming to release Code Bright at the same time as Laravel 4, perhaps not yet in a complete format, but as with Code Happy, further additions will be added overtime, and version updates will be documented. This time around Code Bright will have a more formal affiliation with Laravel and may even include some insight into the construction of the framework from Taylor Otwell himself!
<h2>Summary</h2>
Laravel is in a state of constant evolution. It's users appreciate and support it's ability to improve and provide new functionality. Laravel 4 is no exception, it has changed, and has improved on its previous version, and in my opinion will be even more pleasing for the developers using it.

If you want to help, recommend Laravel to your friends, help promote the framework wherever possible, <a href="http://laravel.com/irc" target="_blank">join in on IRC</a>, and be part of the wonderful community which has formed around the project.

If you can think of something that would be really useful for Laravel 4, <a href="http://laravel.uservoice.com/forums/175973-laravel-4">please let us know on our uservoice</a>!

So I suppose the big question is when will Laravel 4 be available?

<strong>Well I'm pleased to announce that Laravel 4 will be available...</strong>

<em>when we feel that it's ready!</em> (sorry! ;) )
