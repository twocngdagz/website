title: Why Laravel 3.2 is going to rock!
slug: why-laravel-three-point-two-is-going-to-rock
date: 20th May 2012
-------
Why?

---more---

<ul>
    <li>Added <code>to_array</code> method to the base Eloquent model.</li>
    <li>Added <code>$hidden</code> static variable to the base Eloquent model.</li>
    <li>Added <code>sync</code> method to has_many_and_belongs_to Eloquent relationship.</li>
    <li>Added <code>save</code> method to has_many Eloquent relationship.</li>
    <li>Added <code>unless</code> structure to Blade template engine.</li>
    <li>Added Blade comments.</li>
    <li>Added simpler environment management.</li>
    <li>Added <code>Blade::extend()</code> method to define custom blade compilers.</li>
    <li>Added <code>View::exists</code> method.</li>
    <li>Use Memcached API instead of older Memcache API.</li>
    <li>Added support for bundles outside of the bundle directory.</li>
    <li>Added support for DateTime database query bindings.</li>
    <li>Migrated to the Symfony HttpFoundation component for core request / response handling.</li>
    <li>Fixed the passing of strings into the <code>Input::except</code> method.</li>
    <li>Fixed replacement of optional parameters in <code>URL::transpose</code> method.</li>
    <li>Improved <code>update</code> handling on <code>Has_Many</code> and <code>Has_One</code> relationships.</li>
    <li>Improved View performance by only loading contents from file once.</li>
    <li>Fix handling of URLs beginning with hashes in <code>URL::to</code>.</li>
    <li>Fix the resolution of unset Eloquent attributes.</li>
    <li>Allows pivot table timestamps to be disabled.</li>
    <li>Made the <code>get_timestamp</code> Eloquent method static.</li>
    <li><code>Request::secure</code> now takes <code>application.ssl</code> configuration option into consideration.</li>
    <li>Simplified the <code>paths.php</code> file.</li>
    <li>Only write file caches if number of minutes is greater than zero.</li>
    <li>Added <code>$default</code> parameter to Bundle::option method.</li>
    <li>Fixed bug present when using Eloquent models with Twig.</li>
    <li>Allow multiple views to be registered for a single composer.</li>
    <li>Added <code>Request::set_env</code> method.</li>
    <li><code>Schema::drop</code> now accepts <code>$connection</code> as second parameter.</li>
    <li>Added <code>Input::merge</code> method.</li>
    <li>Added <code>Input::replace</code> method.</li>
    <li>Added saving, saved, updating, creating, deleting, and deleted events to Eloquent.</li>
    <li>Added new <code>Sectionable</code> interface to allow cache drivers to simulate namespacing.</li>
    <li>Added support for <code>HAVING</code> SQL clauses.</li>
    <li>Added <code>array_pluck</code> helper, similar to pluck method in Underscore.js.</li>
    <li>Allow the registration of custom cache and session drivers.</li>
    <li>Allow the specification of a separate asset base URL for using CDNs.</li>
    <li>Allow a <code>starter</code> Closure to be defined in <code>bundles.php</code> to be run on Bundle::start.</li>
    <li>Allow the registration of custom database drivers.</li>
    <li>New, driver based authentication system.</li>
    <li>Added Input::json() method for working with applications using Backbone.js or similar.</li>
    <li>Added Response::json method for creating JSON responses.</li>
    <li>Added Response::eloquent method for creating Eloquent responses.</li>
    <li>Fixed bug when using many-to-many relationships on non-default database connection.</li>
    <li>Added true reflection based IoC to container.</li>
    <li>Added <code>Request::route()-&gt;controller</code> and <code>Request::route()-&gt;controller_action</code>.</li>
    <li>Added <code>Event::queue</code>, <code>Event::flusher</code>, and <code>Event::flush</code> methods to Event class.</li>
    <li>Added <code>array_except</code> and <code>array_only</code> helpers, similar to <code>Input::except</code> and <code>Input::only</code> but for arbitrary arrays.</li>
</ul>
Nuff said.
