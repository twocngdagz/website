title: Answering Questions
slug: answering-questions
date: 7th August 2012

------

Lami asks:
<blockquote>Big thanks for such a great book first of all.

Are you familiar with continuous integration with PHP development and how it ties in with Laravel.

Also what tools do you recommend for a startup looking to build their service with Laravel:
<ul>
    <li>Hosting</li>
    <li>Database</li>
    <li>Project Management</li>
    <li>Others</li>
</ul>
</blockquote>

---more---

Hi Lami,

I'm familiar with continuous integration, we are in fact using <a href="http://travis-ci.org/">TravisCI</a> for testing the upcoming release of Laravel so I can highly recommend that if you plan to host your repositories with <a href="https://github.com/">GitHub</a> , for private work you may need a local CI server, I can't recommend any personally but I know there are plenty out there just a google away. As for its relation to Laravel. The practice of continuous integration is standalone, as long as your code is well tested any framework or script will do fine. Laravel 4 will feature a full test suite which could be handy to add into your CI queue if you are planning to hack away at the core. I hope that answers your question.

Tools depend greatly on the needs of the project, but here are some of my favorites. For version control I love Git, and I also love GitHub for project management. But Beanstalkapp and Codebase may offer some better deployment methods if you plan on deploying applications by pushing with your VCS.

For site hosting services like <a href="https://phpfog.com/">PHPFog</a>, <a href="http://www.appfog.com/">Appfog</a> and <a href="https://pagodabox.com/">Pagodabox</a> are great if you like the new method of deploying code directly from your VC repo, but if you are looking for some mighty fast VPS's I have to recommend Amazon's EC2 (I think.. silly codenames) or <a href="http://www.linode.com/">Linode</a>s range of VPS's. Assuming your team has the skills required to maintain a private server.

For database you can't go wrong with good old fashioned mySQL, it's still my favourite. If you are storing document style data there are a number of hip and trendy DocDBs + noSQL DBs that perform fantastically, you have plenty of options!

Project management is a tricky one, I've yet to find one to suit my needs but I hear good things about <a href="https://basecamp.com/">Basecamp</a>. I think that good communication between team members is the most important thing. Taylor and I have been discussing Laravel 4 features and idea's in detail over instant messaging / Skype the last few months and I think it has yielded some great results. Find a communication channel that works for you.

Also check out some of the web apps you enjoy, contact the creators and see what they are using. The web development community is a friendly one, you will find a lot of help if you ask the right people!

Best of luck with your startup, keep me informed!
