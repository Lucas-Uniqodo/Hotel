<?php 

namespace App\Controller;

use App\Entity\Hotel;
use App\Service\DateCalculator;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController {


    private const HOTEL_OPENED = 1969;
    /** 
     * @Route("/")
     */
    public function home(LoggerInterface $logger, DateCalculator $dateCalculator) {

        $logger->info("this message should be printed in var/log/dev.log");

        $year = $dateCalculator->yearsDifference(self::HOTEL_OPENED);

        $hotels = $this->getDoctrine()
            ->getRepository( Hotel::class )
            ->findAllBelowPrice(750);

        // phpinfo();

        $images = [['class' => "",'link' => "intro_room.jpg", 'alt' => "Room"], 
        ['class' => "",'link' => "intro_pool.jpg", 'alt' => "Pool"], 
        ['class' => "",'link' => "intro_dining.jpg", 'alt' => "Dining"], 
        ['class' => "",'link' => "intro_attractions.jpg", 'alt' => "Attractions"], 
        ['class' => "hidesm",'link' => "intro_wedding.jpg", 'alt' => "Dining"]];
        return $this->render('index.html.twig', [ 'year'=> $year, 'images' => $images, 'hotels' => $hotels ]);
    }
}
?>