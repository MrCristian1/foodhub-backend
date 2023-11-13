import '../resources/js/bootstrap';
import axios from 'axios';

// Configurar el token CSRF para todas las solicitudes
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').content;