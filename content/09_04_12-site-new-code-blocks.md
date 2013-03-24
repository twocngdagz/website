title: Site: New code blocks
slug: site-new-code-blocks
date: 9th April 2012
-------------------

I have known for a while now that my previous code block's weren't the easiest to read, so I have decided to change them. We will now be using laravel/github style color schemes with line numbers, they should be more familiar to you and the comments should be easier to read.

---more---

For example ..

<pre>
Schema::create('users', function($table) {
    // auto incremental id (PK)
    $table->increments('id');

    // varchar 32
    $table->string('username', 32);
    $table->string('email', 320);
    $table->string('password', 64);

    // int
    $table->integer('role');

    // boolean
    $table->boolean('active');

    // created_at | updated_at DATETIME
    $table->timestamps();
});
</pre>

The new scheme doesn't fit the color scheme of the site so well, but I don't feel that it 'breaks' the theme either, so we should be ok for now.

The previous tutorials will need to be updated manually to the new style of code blocks, so you will see them gradually improve over time when I get a spare five minutes.

I am also working on a category view for the tutorials, so you can see them all in order without my other blog posts interrupting the procedure.

Thanks for reading!
