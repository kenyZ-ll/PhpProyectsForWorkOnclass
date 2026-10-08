(() => {
  const INTERVALO_REPRODUCCION = 5000;
  const preferenciaMovimientoReducido = window.matchMedia('(prefers-reduced-motion: reduce)');

  /**
   * Controla las diapositivas y los controles accesibles del carrusel.
   */
  class Carrusel {
    constructor(elemento) {
      this.elemento = elemento;
      this.diapositivas = elemento.querySelector('.carrusel__diapositivas');
      this.controles = elemento.querySelector('.carrusel__controles');
      this.indicadores = elemento.querySelector('.carrusel__indicadores');
      this.imagenes = JSON.parse(elemento.dataset.imagenes);
      this.indiceActual = 0;
      this.temporizador = null;
      this.botonesIndicadores = [];
      this.punteroDentro = false;
      this.focoDentro = false;

      this.crearDiapositivas();
      if (this.imagenes.length > 1) {
        this.crearControles();
        this.crearIndicadores();
        this.registrarNavegacion();
        this.iniciarReproduccion();
      }
      this.actualizarDiapositiva();
    }

    crearDiapositivas() {
      this.imagenes.forEach((ruta, indice) => {
        const imagen = document.createElement('img');
        imagen.className = 'carrusel__imagen';
        imagen.src = ruta;
        imagen.alt = `Imagen ${indice + 1} del carrusel`;
        imagen.hidden = true;
        this.diapositivas.append(imagen);
      });
    }

    crearControles() {
      const anterior = this.crearBoton('carrusel__boton', 'Imagen anterior', 'Anterior');
      const siguiente = this.crearBoton('carrusel__boton', 'Imagen siguiente', 'Siguiente');

      anterior.addEventListener('click', () => this.mostrarDiapositiva(this.indiceActual - 1));
      siguiente.addEventListener('click', () => this.mostrarDiapositiva(this.indiceActual + 1));
      this.controles.append(anterior, siguiente);
    }

    crearIndicadores() {
      this.indicadores.setAttribute('role', 'group');
      this.indicadores.setAttribute('aria-label', 'Seleccionar imagen');

      this.imagenes.forEach((_, indice) => {
        const indicador = this.crearBoton(
          'carrusel__indicador',
          `Mostrar imagen ${indice + 1}`,
          ''
        );
        indicador.addEventListener('click', () => this.mostrarDiapositiva(indice));
        this.botonesIndicadores.push(indicador);
        this.indicadores.append(indicador);
      });
    }

    crearBoton(clase, etiqueta, texto) {
      const boton = document.createElement('button');
      boton.type = 'button';
      boton.className = clase;
      boton.setAttribute('aria-label', etiqueta);
      boton.textContent = texto;
      return boton;
    }

    registrarNavegacion() {
      this.elemento.tabIndex = 0;
      this.elemento.addEventListener('keydown', (evento) => {
        if (evento.key === 'ArrowLeft' || evento.key === 'ArrowRight') {
          evento.preventDefault();
          this.mostrarDiapositiva(
            this.indiceActual + (evento.key === 'ArrowRight' ? 1 : -1)
          );
        }
      });

      this.elemento.addEventListener('mouseenter', () => {
        this.punteroDentro = true;
        this.iniciarReproduccion();
      });
      this.elemento.addEventListener('mouseleave', () => {
        this.punteroDentro = false;
        this.iniciarReproduccion();
      });
      this.elemento.addEventListener('focusin', () => {
        this.focoDentro = true;
        this.iniciarReproduccion();
      });
      this.elemento.addEventListener('focusout', (evento) => {
        if (!this.elemento.contains(evento.relatedTarget)) {
          this.focoDentro = false;
          this.iniciarReproduccion();
        }
      });

      preferenciaMovimientoReducido.addEventListener('change', () => {
        this.iniciarReproduccion();
      });
    }

    mostrarDiapositiva(indice) {
      this.indiceActual = (indice + this.imagenes.length) % this.imagenes.length;
      this.actualizarDiapositiva();
    }

    actualizarDiapositiva() {
      Array.from(this.diapositivas.children).forEach((diapositiva, indice) => {
        diapositiva.hidden = indice !== this.indiceActual;
      });

      this.botonesIndicadores.forEach((indicador, indice) => {
        indicador.setAttribute('aria-pressed', String(indice === this.indiceActual));
      });
    }

    iniciarReproduccion() {
      if (
        this.imagenes.length < 2
        || preferenciaMovimientoReducido.matches
        || this.punteroDentro
        || this.focoDentro
      ) {
        this.pausarReproduccion();
        return;
      }

      if (this.temporizador) {
        return;
      }

      this.temporizador = window.setInterval(
        () => this.mostrarDiapositiva(this.indiceActual + 1),
        INTERVALO_REPRODUCCION
      );
    }

    pausarReproduccion() {
      if (this.temporizador) {
        window.clearInterval(this.temporizador);
        this.temporizador = null;
      }
    }
  }

  document.querySelectorAll('.carrusel[data-imagenes]').forEach((elemento) => {
    new Carrusel(elemento);
  });
})();
