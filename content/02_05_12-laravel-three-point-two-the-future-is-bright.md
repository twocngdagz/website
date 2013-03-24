title: Laravel 3.2: The future is bright
slug: laravel-three-point-two-bright-future
date: 2nd May 2012
----------------

With Laravel 3.2 just around the corner, I thought I would take some time out from my usual tutorials and show you all some of the new features that will land with the next version of Laravel. I'm a pretty modest guy, so let's start with the features that I helped with first, me me me, me me ME me me me..

---more---

<h2>Offline Docs</h2>
It feels like a year since Taylor and I finished working on this, and I'm excited to hear what people have to say about it. We have had a lot of requests from the community for a method of taking the documentation with them. Apparently our coders are so relaxed and hip that they live jet set lifestyles, they need to be able to access the documentation on a plane, a jet ski, or the back of a giraffe. Your wish is our command, behold the offline docs.

Taylor had already setup most of the markdown processing when he approached me hoping for a simple modification to the welcome page to be able to view the docs, but we decided to take this a step further. We have since created all new welcome pages, error pages, and full documentation templates, all very clean and crisp and very easy to read on the move. Taylor let me have my wicked way with the design (should he be trusting a developer with design tasks? ;) and we are both pleased with the results. Let's hope you are too! Here's a quick preview for those who are too lazy to download the develop.

<img class="aligncenter size-medium wp-image-258" title="Laravel_ A Framework For Web Artisans-1" src="/img/laravel_1.jpg" alt="" width="300" height="194" />

<h2>The Profiler</h2>
Shortly after the release of Laravel 3.1, I created a little bundle that despite my shoddy javascript received a great deal of popularity, Anbu.

Anbu is a little toolbar that sits at the bottom of your views and reports useful information such as log entries, SQL queries performed, and other neat stuff. I added a few snazzy javascript animations and ended up with a useful but pretty front-end profiler. Taylor saw the profiler a short while later and seemed to fall in love with it (people please, look at the terrible JS!) and asked if it could be included into the core. Of course it can!

I integrated Anbu with the core, and added a little bit of extra branding to make it more Laravelsexy (it's a word) and Taylor renamed the package to Profiler. As of Laravel 3.2 you can enable profiler in the configs, and debug til you are as happy as a red panda. Enjoy!

<img class="aligncenter size-medium wp-image-260" title="Laravel_ A Framework For Web Artisans-2" src="/img/laravel_2.jpg" alt="" width="300" height="26" />
<h2>Blade</h2>
I was using blade to write some front end forms when I thought..
<blockquote>Wouldn't it be cool to be able to add comments to blade templates, to comment on the visual aspects of the application, without them being rendered at runtime.</blockquote>
After much debate about whether it was a justifyable feature, and the format of the comments themselves, meet the new blade comments :
<pre><code>{{-- a simple multiline comment --}}

{{-- a single line comment
</code></pre>

I hope you find them as useful as I hoped they would be!

Blade also has a new <code>@unless</code> which acts as a simple 'IF NOT'.
<pre><code>@unless(3==3)
    &lt;p&gt;THREE MUST BE THREE&lt;/p&gt;
@endunless
</code></pre>

Enjoy!
<h2>to_array()</h2>
or not to_array.. that is the question. Eloquent objects now have a <code>to_array()</code> method to return the object represented as a key-value array, simple!
<h2>Authentication</h2>
The Authentication system in Laravel is pretty neat, and with the addition of the config closures it became more configurable. Taylor has taken this a step further with the inclusion of Authentication drivers, allowing you to create a simple class to handle basic authentication methods, with the possibility of tieng the Authentication procedure to a data source of your choice.

Naturally Taylor has included Eloquent and Fluent drivers with 3.2 to provide some familiar defaults.
<h2>Input::json()</h2>
Now some methods to help those who are building API's on top of Laravel. The Input::json() method allows you to retrieve the JSON payload of the Input class as an array, very handy for backbone and other JS FW's!

You can now use Response::json() to output a JSON response from a PHP array, or Response::eloquent() to output an Eloquent object as JSON, super handy!

Well those are a few of my favorite features! The <a href="https://github.com/laravel/laravel/blob/develop/laravel/documentation/changes.md#3.2" target="_blank">complete list of features can be found here</a>. Thanks to everyone who has contributed to the project.

I would also like to say hi (wave) to our amazing Laravel Community members, come and join us in #laravel on freenode if you would like a chat!
