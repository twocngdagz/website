title: Trick: Chainable Libraries
slug: trick-chainable-libraries
date: 13th April 2012
--------

<p>You may have seen Laravel's core libraries use method chaining as an elegant way of providing multiple user definable settings to a library, for example the Fluent Query Builder allows you to chain methods together to build your SQL query before executing it, like this..</p>

---more---

<pre><code>DB::table('users')-&gt;where('name', '=', 'dayle')-&gt;take(5)-&gt;get();
</code></pre>

<p>It's a system that simply makes sense to use, and is very clear to read. Today I am going to help you build chainable classes, so that your libraries will start to feel more 'Laravelish'. (If that isn't a real word we need to make it one.)</p>

<p>I'm going to start by showing you a chainable class, all done.</p>

<pre><code>class Ball
{
    private $size = 1;
    private $color = 'blue';
    private $texture = 'squishy';

    // creator
    public static function make()
    {
        $ball = new Ball();
        return $ball;
    }

    // chain
    public function size($size)
    {
        $this-&gt;size = $size;
        return $this;
    }

    // chain
    public function color($color)
    {
        $this-&gt;color = $color;
        return $this;
    }

    // chain
    public function texture($texture)
    {
        $this-&gt;texture = $texture;
        return $this;
    }

    // trigger
    public function get()
    {
        return "This is a {$this-&gt;texture} {$this-&gt;color} ball, size {$this-&gt;size}.";
    }
}
</code></pre>

<p>I bet its not as complicated as you thought it would be! Before we can look at how it works, first you will need to know the three parts of a chainable class. I will use my own names for these parts, feel free to borrow them!</p>

<p><strong><em>Creator</em></strong></p>

<p>The creator method is normally static, and is used to create a new instance of the class. It will always return the class instance as the result of the method. In my example the creator is <code>make()</code>.</p>

<p><strong><em>Chains</em></strong></p>

<p>Chains are methods which alter the class in some way. They are non-static public methods, which set class attributes with the new settings passed to them. Chains will always return the current instance of the class, which is <code>$this</code>.</p>

<p><strong><em>Triggers</em></strong></p>

<p>Trigger methods are found at the end of the chain. They are the methods that make use of all of class attributes we have changed. They either perform an action, or return a result.</p>

<p>Let's have a closer look at each part of our class, first the <code>Creator</code> method <code>make()</code>.</p>

<pre><code>// creator
public static function make()
{
    $ball = new Ball();
    return $ball;
}
</code></pre>

<p>As you can see, a static call to make creates a new instance of our class, and hands it back as the result. So this line of PHP is perfectly acceptable..</p>

<pre><code>$ball = Ball::make();
</code></pre>

<p>Similar to..</p>

<pre><code>$ball = new Ball();
</code></pre>

<p>Now we know what our creator method does, let's have a closer look at the <code>chain</code> methods..</p>

<pre><code>// chain
public function size($size)
{
    $this-&gt;size = $size;
    return $this;
}

// chain
public function color($color)
{
    $this-&gt;color = $color;
    return $this;
}

// chain
public function texture($texture)
{
    $this-&gt;texture = $texture;
    return $this;
}
</code></pre>

<p>The chain methods are making changes to class attributes using the parameters provided to them, and returning the current object instance, which can always be found using <code>$this</code>.</p>

<p>So now we could use the following code..</p>

<pre><code>$ball = Ball::make();
$ball-&gt;color('red');
</code></pre>

<p>This is perfectly fine, but it could look better. The <code>make()</code> method is returning an object instance, so we can attach our chain method on to the end, to call the method on the object instance that has been returned. Therefore the code..</p>

<pre><code>$ball = Ball::make()-&gt;color('red');
</code></pre>

<p>Which will perform in the same way as the last code snippet. We can attach as many chains as we want, because they all return the current object instance, for example..</p>

<pre><code>$ball = Ball::make()-&gt;color('red')-&gt;size(5)-&gt;texture('fuzzy');
</code></pre>

<p>The chains can also be added in any order we like.</p>

<p>To make use of our changes we will need to use a <code>trigger</code> method, in our class the trigger method is <code>get()</code>.</p>

<pre><code>// trigger
public function get()
{
    return "This is a {$this-&gt;texture} {$this-&gt;color} ball, size {$this-&gt;size}.";
}
</code></pre>

<p>The <code>get()</code> method makes use of all our newly set class attributes and returns a short sentence describing the ball that we have made.</p>

<pre><code>echo Ball::make()-&gt;size(4)-&gt;get();
</code></pre>

<p>gives..</p>

<pre><code>This is a squishy blue ball, size 4.
</code></pre>

<p>In this example I have simply supplied the <code>size()</code> chain, which works fine because I have set default values for all my class attributes.</p>

<p>So now we know how to make a chainable class, and some 'Laravelish' libraries, go forth and make clean, expressive bundles!</p>
