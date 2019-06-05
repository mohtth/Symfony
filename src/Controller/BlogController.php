<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Article;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog/show/{slug}", name="blog_show", requirements={"slug"="[a-z0-9-\.:\/\/=&]+"},
     *     defaults={"slug"="article-sans-titre"})
     */
    public function show($slug)
    {
            $slug = ucwords(str_replace('-', ' ', $slug));
            return $this->render('blog/show.html.twig', [
                'slug' => $slug,
            ]);
    }
    /**
     * @Route("/blog/category/{name}", name="blog_show_category")
     */
    public function showByCategory(Category $category)
    {
       // $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(['name' => $categoryName]);
        $articles = $category->getArticles();

        return $this->render('blog/category.html.twig', [
            'category' => $category,
            'articles' => $articles
        ]);
    }
}