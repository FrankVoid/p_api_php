<?php
// Declaración del tipo estricto de PHP para asegurar un código más robusto
declare(strict_types=1);

// Definición de la clase NextMovie
class NextMovie {
    
    // Declaración de propiedades de la clase con constructor property promotion
    public function __construct(
        private string $title, // Título de la película (cadena de texto)
        private int $days_until, // Días hasta el estreno (entero)
        private string $following_production, // Producción siguiente (cadena de texto)
        private string $release_date, // Fecha de estreno (cadena de texto)
        private string $poster_url, // URL del póster (cadena de texto)
        private string $overview, // Resumen de la película (cadena de texto)
    ) {}  // Fin del constructor

    // Método para obtener un mensaje según los días hasta el estreno
    function get_until_message(): string {
        // Obtener el número de días hasta el estreno
        $days = $this->days_until;
        // Devolver un mensaje basado en el número de días usando una estructura match
        return match (true) {
            $days == 0   => 'Hoy se estrena ', // Si faltan 0 días, la película se estrena hoy
            $days == 1   => 'Mañana es el estreno ', // Si falta 1 día, la película se estrena mañana
            $days == 7   => 'Esta semana es el estreno ', // Si faltan 7 días, la película se estrena esta semana
            $days == 30  => 'Este mes es el estreno ', // Si faltan 30 días, la película se estrena este mes
            default => "En $days días para el estreno ", // Por defecto, mostrar el número de días faltantes
        };
    }
    
    // Método estático para obtener datos de una URL API y crear una instancia de NextMovie
    public static function file_and_create_movie(string $api_url): NextMovie {
        // Obtener los datos de la URL de la API y decodificarlos como un array asociativo
        $result = file_get_contents($api_url);
        $data = json_decode($result, true);
        // Crear y devolver una nueva instancia de NextMovie con los datos obtenidos
        return new self(
            $data['title'], // Título de la película
            $data['days_until'], // Días hasta el estreno
            $data['following_production']['title'] ?? "No hay información", // Título de la producción siguiente o "No hay información" si no está disponible
            $data['release_date'], // Fecha de estreno
            $data['poster_url'], // URL del póster
            $data['overview'] // Resumen de la película
        );
    }
    
    // Método para obtener los datos de la instancia como un array asociativo
    public function get_data() {
        return get_object_vars($this); // Devuelve un array asociativo con las propiedades de la clase
    }
}
?>
