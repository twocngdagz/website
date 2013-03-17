title:  This is a long title to see how the post title wraps within the container.
slug:   first-article-title
date:   13th March 2013
tags:   first,second,third
---------------------------
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in nunc libero. Nullam et risus felis, id consequat mauris. Sed ac aliquet velit. Quisque nec dolor vel leo dapibus suscipit. Mauris id nibh at urna molestie posuere. Ut diam nisl, imperdiet eu rutrum a, eleifend et erat. Morbi bibendum nulla at eros elementum id venenatis odio accumsan.

---more---

Nullam et mi ac est consectetur commodo eu a dui. In lorem sem, vulputate vel cursus ac, porta eu purus. Morbi suscipit dapibus leo ac aliquam. Nunc non condimentum mi. Nulla accumsan luctus nisl, et pharetra augue convallis vel. Aliquam faucibus interdum congue. Quisque porta elementum purus nec tincidunt.

Aenean dictum odio quis dui iaculis gravida. In hac habitasse platea dictumst. Fusce et neque sed mauris scelerisque lobortis sit amet aliquet orci. Proin luctus lacinia feugiat. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi aliquet elementum nisi, a interdum risus dapibus eu. Donec congue libero ac nulla feugiat cursus.

    <?php

    namespace Website\Controller;

    use App;
    use View;
    use Paginator;
    use Controller;

    class BlogController extends Controller
    {
        public function showIndex()
        {
            $blog = App::make('blog');
            $posts = $blog->findAll();
            $data['posts'] = Paginator::make($posts, count($posts), 1);
            return View::make('index', $data);
        }

        public function showArticle($slug)
        {
            $blog = App::make('blog');
            $data['post'] = $blog->findBySlug($slug);
            return View::make('single', $data);
        }
    }

Cras pellentesque rhoncus risus, eu adipiscing odio imperdiet et. Quisque aliquam euismod libero ut tempor. Morbi interdum eros a erat blandit iaculis. Aenean lacinia hendrerit odio non suscipit. Donec at enim vel diam commodo vulputate venenatis sed nibh. Etiam risus erat, lobortis in hendrerit et, commodo et lorem. Phasellus blandit tincidunt aliquam. Etiam sed erat mauris, ut ullamcorper tellus.

Duis lacinia magna eget diam cursus porta. Nam lacus tellus, placerat egestas iaculis at, viverra vitae massa. Curabitur ligula justo, tincidunt sit amet fringilla id, congue quis eros. Nam at nulla vitae ante interdum rutrum a mollis arcu. Nullam ut urna ut nisl mollis auctor sed in turpis. Morbi volutpat odio quis sapien venenatis pretium. Nullam leo justo, tempus vel luctus in, tristique ut tortor. Etiam eleifend magna non mauris elementum aliquam. Nam sodales felis ut dolor scelerisque nec fringilla ligula vulputate.
