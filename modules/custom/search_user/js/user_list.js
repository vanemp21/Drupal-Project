(function ($, Drupal) {
  Drupal.behaviors.userList = {
    attach: function (context, settings) {
      // Gestiona el formulario de búsqueda
      $("#user-search-form", context).submit(function (e) {
        e.preventDefault();
        const formData = $(this).serialize();
        // Almacena los filtros en una variable global
        window.userFilters = formData;

        loadPage(1); // Carga la primera página después de realizar la búsqueda
      });

      // Controla el botón de paginación anterior
      $("#prev-page", context).click(function () {
        let currentPage = parseInt(
          $("#current-page").text().replace("Página ", "")
        );
        if (currentPage > 1) {
          loadPage(currentPage - 1); // Carga la página anterior si no es la primera
        }
      });

      // Controla el botón de paginación siguiente
      $("#next-page", context).click(function () {
        let currentPage = parseInt(
          $("#current-page").text().replace("Página ", "")
        );
        loadPage(currentPage + 1); // Carga la siguiente página
      });

      function loadPage(page) {
        const queryString =
          $.param({ page: page }) + "&" + (window.userFilters || "");

        $.get("/prueba_drupal/user-list/ajax?" + queryString, function (data) {
          if (data.usuarios.length == 0) {
            $("#user-list").html("<p>No se encontraron resultados.</p>"); // Mensaje cuando no hay usuarios
          } else if (data.usuarios && Array.isArray(data.usuarios)) {
            // Crea la tabla con los datos de los usuarios
            let html = `
              <table>
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Apellido 2</th>
                    <th>Correo Electrónico</th>
                  </tr>
                </thead>
                <tbody>
            `;

            // Añade cada usuario a la tabla
            data.usuarios.forEach(function (user) {
              html += `
                <tr>
                  <td>${user.name}</td>
                  <td>${user.surname1}</td>
                  <td>${user.surname2}</td>
                  <td>${user.email}</td>
                </tr>
              `;
            });

            html += "</tbody></table>";
            $("#user-list").html(html); // Muestra la tabla en el contenedor
            $("#current-page").text("Página " + page); // Actualiza el número de página
          }

        }).fail(function (jqXHR, textStatus, errorThrown) {
          console.error("Error en la solicitud AJAX:", textStatus, errorThrown); // Muestra errores en la consola
          $("#user-list").html("<p>Error al cargar los datos.</p>"); // Mensaje de error
        });
      }
    },
  };
})(jQuery, Drupal);
