<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Attributes as OA;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{   
    /**
     * List the rewards of the specified user.
     *
     * This call takes into account all confirmed awards, but not pending or refused awards.
     */
    #[Route('/api/auth/login', methods: ['POST'])]
    
    #[OA\Tag(name: 'login')]
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->get('username') == null || $request->get('password') == null) {
            return $this->json([
                'message' => 'Missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
