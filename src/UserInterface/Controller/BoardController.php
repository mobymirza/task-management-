<?php

namespace App\UserInterface\Controller;

use App\Application\Bus\CommandBus;
use App\Application\Command\CreateBoardCommand;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

final class BoardController extends AbstractController
{
    #[Route('/create-board', name: 'board')]
    public function index(Request $request,CommandBus $commandBus): JsonResponse
    {
       $command = new CreateBoardCommand(
          $request->getPayload()->get('name'),
        $request->getPayload()->get('description'),
       );

        try {
            $commandBus->dispatch($command);
        }
        catch (\DomainException $exception)
        {
            return  $this->HandleDomainException($exception);
        }

        return new JsonResponse([
            'message' => 'Board created successfully!',
        ], 201);

    }
}
