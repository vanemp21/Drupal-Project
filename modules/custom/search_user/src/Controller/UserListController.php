<?php

namespace Drupal\search_user\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UserListController extends ControllerBase {

  public function page() {
    // Prepara la página con el tema y la biblioteca asociada
    $build = [
      '#theme' => 'user_list',
      '#attached' => [
        'library' => [
          'search_user/search_user',
        ],
      ],
    ];
    return $build;
  }

  public function ajax(Request $request) {
    // Obtiene la página actual y define el límite de resultados por página
    $page = $request->query->get('page', 1);
    $limit = 5;
    $offset = ($page - 1) * $limit;
    $filters = $request->query->all();

    // Registra los filtros que se han recibido para depuración
    \Drupal::logger('search_user')->notice('Filtros recibidos: @filters', ['@filters' => print_r($filters, TRUE)]);

    $data = $this->fetchUserData($filters, $limit, $offset);

    return new JsonResponse($data);
  }

  private function fetchUserData($filters, $limit, $offset) {
    // Simula una lista de usuarios para fines de prueba
    $users = [];
    for ($i = 1; $i <= 15; $i++) {
      $users[] = [
        'id' => $i,
        'email' => 'admin' . $i . '@yopmail.com',
        'name' => 'admin' . $i,
        'surname1' => 'admin' . $i,
        'surname2' => 'admin' . $i,
      ];
    }

    // Filtra los usuarios según los filtros proporcionados
    $filtered_users = array_filter($users, function($user) use ($filters) {
      $match = true;

      // Filtra por nombre
      if (!empty($filters['name'])) {
        $match = stripos($user['name'], $filters['name']) !== false;
      }

      // Filtra por primer apellido
      if ($match && !empty($filters['surname'])) {
        $match = stripos($user['surname1'], $filters['surname']) !== false;
      }

      // Filtra por correo electrónico
      if ($match && !empty($filters['email'])) {
        $match = stripos($user['email'], $filters['email']) !== false;
      }

      return $match;
    });

    // Realiza la paginación de los resultados filtrados
    $paged_users = array_slice($filtered_users, $offset, $limit);
    
    // Registra los resultados filtrados para depuración
    \Drupal::logger('search_user')->notice('Usuarios filtrados: @users', ['@users' => print_r($paged_users, TRUE)]);

    return [
      'usuarios' => $paged_users,
      'total' => count($filtered_users),
    ];
  }
}
