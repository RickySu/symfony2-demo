<?php

namespace Ricky\Bundle\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Ricky\Bundle\TestBundle\Entity;

class DefaultController extends Controller
{
    /**
     * @Route("/test")
     * @Template()
     */
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();

        $category = new Entity\Category();
        $category->setName('Category1');
        $em->persist($category);

        $tag1 = new Entity\Tag();
        $tag1->setName('post1-tag1');
        $em->persist($tag1);

        $tag2 = new Entity\Tag();
        $tag2->setName('post1-tag2');
        $em->persist($tag2);

        $CoverPhoto1 = new Entity\CoverPhoto();
        $CoverPhoto1->setInfo("some info about post1");
        $em->persist($CoverPhoto1);

        $post1 = new Entity\Post();
        $post1->setCategory($category);
        $post1->setContent("post1 content");
        $post1->setTitle("this is post1");
        $post1->addTag($tag1);
        $post1->addTag($tag2);
        $post1->setCoverPhoto($CoverPhoto1);
        $em->persist($post1);

        $tag1 = new Entity\Tag();
        $tag1->setName('post2-tag1');
        $em->persist($tag1);

        $tag2 = new Entity\Tag();
        $tag2->setName('post2-tag2');
        $em->persist($tag2);

        $CoverPhoto2 = new Entity\CoverPhoto();
        $CoverPhoto2->setInfo("some info about post2");
        $em->persist($CoverPhoto2);

        $post2 = new Entity\Post();
        $post2->setCategory($category);
        $post2->setContent("post2 content");
        $post2->setTitle("this is post2");
        $post2->addTag($tag1);
        $post2->addTag($tag2);
        $post2->setCoverPhoto($CoverPhoto2);
        $em->persist($post2);

        $em->flush();

        return array();
    }

    /**
     * @Route("/test2")
     * @Template()
     */
    public function test2Action()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->getRepository('RickyTestBundle:Category')->find(1);
        return array('category'=>$category);
    }

    /**
     * @Route("/test3")
     * @Template()
     */
    public function test3Action()
    {
        $em = $this->getDoctrine()->getManager();
        $category = $em->createQueryBuilder()
                ->select('c, p, t')
                ->from('RickyTestBundle:Category', 'c')
                ->innerJoin('c.posts','p')
                ->leftJoin('p.tags','t')
                ->where('c.id = :id')
                ->setParameter('id', 1)
                ->getQuery()
                ->getSingleResult();
        return array('category'=>$category);
    }

}
