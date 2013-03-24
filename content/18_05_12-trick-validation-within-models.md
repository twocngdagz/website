title: Trick: Validation within models.
slug: trick-validation-within-models
date: 18th May 2012
--------
<p>Often when dealing with Eloquent models you will fall into the pattern of retrieving data from the user, validating it, filling the model and saving it.</p>

<p>This is perfectly fine, but can lead to a large amount of validation code within your routes and controllers. Let's have a look at how we can shift some of the validation logic into our models instead and clean up our routing. First we will need our Eloquent model.</p>

---more---

<pre><code>class Ball extends Eloquent
{

}
</code></pre>

<p>Great! That's all we need, now lets add a new private property to the model called rules. This will store our validation rules array in the usual format.</p>

<pre><code>class Ball extends Eloquent
{
    private $rules = array(
        'color' =&gt; 'required|alpha|min:3',
        'size'  =&gt; 'required',
        // .. more rules here ..
    );
}
</code></pre>

<p>Great! Now our rules are attached to our model, this means that we won't have to recreate the validation array each time we create a new model instance. Now we need a way of using these rules, I like to create a public <code>validate()</code> method, let's take a look..</p>

<pre><code>class Ball extends Eloquent
{
    private $rules = array(
        'color' =&gt; 'required|alpha|min:3',
        'size'  =&gt; 'required',
        // .. more rules here ..
    );

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this-&gt;rules);
        // return the result
        return $v-&gt;passes();
    }
}
</code></pre>

<p>Great! Now we can validate our models using the following syntax.</p>

<pre><code>// get the POST data
$new = Input::all();

// create a new model instance
$b = new Ball();

// attempt validation
if ($b-&gt;validate($new))
{
    // success code
}
else
{
    // failure
}
</code></pre>

<p>That's a lot more compact, but we are missing something important. What about our validation errors? We will need those for our forms. Let's create a new private attribute to store them.</p>

<pre><code>class Ball extends Eloquent
{
    private $rules = array(
        'color' =&gt; 'required|alpha|min:3',
        'size'  =&gt; 'required',
        // .. more rules here ..
    );

    private $errors;

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this-&gt;rules);

        // check for failure
        if ($v-&gt;fails())
        {
            // set errors and return false
            $this-&gt;errors = $v-&gt;errors;
            return false;
        }

        // validation pass
        return true;
    }
}
</code></pre>

<p>Now we need a method to be able to retrieve the errors object.</p>

<pre><code>class Ball extends Eloquent
{
    private $rules = array(
        'color' =&gt; 'required|alpha|min:3',
        'size'  =&gt; 'required',
        // .. more rules here ..
    );

    private $errors;

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this-&gt;rules);

        // check for failure
        if ($v-&gt;fails())
        {
            // set errors and return false
            $this-&gt;errors = $v-&gt;errors;
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this-&gt;errors;
    }
}
</code></pre>

<p>Great! Let's take a look at it in action.</p>

<pre><code>// get the POST data
$new = Input::all();

// create a new model instance
$b = new Ball();

// attempt validation
if ($b-&gt;validate($new))
{
    // success code
}
else
{
    // failure, get errors
    $errors = $b-&gt;errors();
}
</code></pre>

<p>We now have a working validation model, but to use this same system across many models we would have to replicate the code across the other classes..</p>

<blockquote>
  <p>Dayle, surely there's a better way?</p>
</blockquote>

<p>Do not fear! There is always a better way! Let's create a new base model with the code that we have already used. I like to call mine <code>Elegant</code>.</p>

<pre><code>class Elegant extends Eloquent
{
    protected $rules = array();

    protected $errors;

    public function validate($data)
    {
        // make a new validator object
        $v = Validator::make($data, $this-&gt;rules);

        // check for failure
        if ($v-&gt;fails())
        {
            // set errors and return false
            $this-&gt;errors = $v-&gt;errors;
            return false;
        }

        // validation pass
        return true;
    }

    public function errors()
    {
        return $this-&gt;errors;
    }
}
</code></pre>

<p>Now we can have our models extend the base model <code>Elegant</code> instead of <code>Eloquent</code>, define a <code>$rules</code> array, and have access to all the validation features we had before..</p>

<pre><code>class Ball extends Elegant
{
    protected $rules = array(
        'color' =&gt; 'required|alpha|min:3',
        'size'  =&gt; 'required',
        // .. more rules here ..
    );
}
</code></pre>

<p>That's all for now! Enjoy using your validation friendly Elegant models!</p>
