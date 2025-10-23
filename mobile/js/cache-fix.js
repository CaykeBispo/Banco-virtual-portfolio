/**
 * Script Simples para Forçar Atualização
 * Remove cache antigo e força carregamento da versão atual
 */

(function() {
    'use strict';
    
    console.log('🔄 Iniciando correção de cache...');
    
    // Função para limpar cache local
    function clearLocalCache() {
        try {
            // Limpa localStorage
            localStorage.clear();
            console.log('✅ localStorage limpo');
            
            // Limpa sessionStorage
            sessionStorage.clear();
            console.log('✅ sessionStorage limpo');
            
        } catch (error) {
            console.log('⚠️ Erro ao limpar cache local:', error);
        }
    }
    
    // Função para forçar reload de imagens
    function reloadImages() {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            const src = img.src;
            if (src.includes('?')) {
                img.src = src.split('?')[0] + '?v=' + Date.now();
            } else {
                img.src = src + '?v=' + Date.now();
            }
        });
        console.log('✅ Imagens recarregadas');
    }
    
    // Função para forçar reload de CSS
    function reloadCSS() {
        const links = document.querySelectorAll('link[rel="stylesheet"]');
        links.forEach(link => {
            const href = link.href;
            if (href.includes('?')) {
                link.href = href.split('?')[0] + '?v=' + Date.now();
            } else {
                link.href = href + '?v=' + Date.now();
            }
        });
        console.log('✅ CSS recarregado');
    }
    
    // Função para forçar reload do background
    function reloadBackground() {
        const body = document.body;
        const timestamp = Date.now();
        
        // Oculta o formulário durante o carregamento
        const form = document.querySelector('#boxAcesso');
        if (form) {
            form.classList.remove('loaded');
        }
        
        // Define um gradiente com a cor #d83756 de fallback primeiro
        body.style.background = 'linear-gradient(135deg, #d83756 0%, #c42a4a 100%)';
        
        // Tenta carregar a imagem
        const img = new Image();
        img.onload = function() {
            // Se a imagem carregou, aplica ela
            body.style.backgroundImage = `url('../../images/background-mobile.jpg?v=${timestamp}')`;
            body.style.backgroundSize = 'cover';
            body.style.backgroundPosition = 'center center';
            body.style.backgroundRepeat = 'no-repeat';
            body.style.backgroundAttachment = 'fixed';
            
            // Mostra o formulário após carregar
            if (form) {
                form.classList.add('loaded');
            }
            console.log('✅ Background com imagem carregado');
        };
        img.onerror = function() {
            // Se a imagem não carregou, mantém o gradiente com #d83756
            console.log('⚠️ Imagem não encontrada, usando gradiente #d83756');
            body.style.background = 'linear-gradient(135deg, #d83756 0%, #c42a4a 100%)';
            
            // Mostra o formulário mesmo sem imagem
            if (form) {
                form.classList.add('loaded');
            }
        };
        img.src = `../../images/background-mobile.jpg?v=${timestamp}`;
    }
    
    // Função para mostrar formulário após carregamento
    function showFormAfterLoad() {
        const form = document.querySelector('#boxAcesso');
        if (form) {
            // Aguarda um pouco para garantir que o background carregou
            setTimeout(() => {
                form.classList.add('loaded');
                console.log('✅ Formulário exibido após carregamento');
            }, 100);
        }
    }

    // Função principal
    function forceUpdate() {
        console.log('🚀 Forçando atualização completa...');
        
        // Limpa cache local
        clearLocalCache();
        
        // Recarrega recursos
        reloadImages();
        reloadCSS();
        reloadBackground();
        
        console.log('✅ Atualização forçada concluída');
    }
    
    // Executa quando o DOM estiver pronto
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', forceUpdate);
    } else {
        forceUpdate();
    }
    
    // Função global para executar manualmente
    window.forceUpdateCache = forceUpdate;
    
    // Adiciona listener para detectar mudanças de orientação
    window.addEventListener('orientationchange', function() {
        setTimeout(forceUpdate, 500);
    });
    
    // Adiciona listener para detectar visibilidade da página
    document.addEventListener('visibilitychange', function() {
        if (!document.hidden) {
            forceUpdate();
        }
    });
    
    // Mostra o formulário após carregamento inicial
    showFormAfterLoad();
    
    console.log('🔧 Script de correção de cache carregado');
    console.log('💡 Use window.forceUpdateCache() para executar manualmente');
    
})();
