import './bootstrap';
import React from 'react';
import { createRoot } from 'react-dom/client';
import AnimatedContent from './components/animations/AnimatedContent';



// Find all elements with data-animate attribute
document.querySelectorAll('[data-animate]').forEach(element => {
    const root = createRoot(element);
    const content = element.innerHTML;
    element.innerHTML = '';
    
    root.render(
        <AnimatedContent 
            content={content}
            className={element.className}
        />
    );
});

