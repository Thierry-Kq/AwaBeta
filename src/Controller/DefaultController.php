<?php

namespace App\Controller;

use App\Form\BookingType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     */
    public function index(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {

        $form = $this->createForm(BookingType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

//            dd($form->getData());
            $booking = $form->getData();
//            $booking->setTimeSlot = [1, 2, 3, 4];
            $entityManager->persist($booking);
            $entityManager->flush();
        }

        return $this->render('default/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
