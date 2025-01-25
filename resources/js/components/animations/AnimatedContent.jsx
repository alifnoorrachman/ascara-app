import React from 'react';
import { motion } from 'framer-motion';
import { useEffect, useRef, useState } from 'react';

const AnimatedContent = ({ content, className }) => {
  const ref = useRef(null);
  const [isVisible, setIsVisible] = useState(false);
  const [direction, setDirection] = useState('down');

  useEffect(() => {
    const observer = new IntersectionObserver(
      ([entry]) => {
        if (entry.isIntersecting) {
          setDirection(entry.boundingClientRect.top < 0 ? 'up' : 'down');
          setIsVisible(true);
        } else {
          setIsVisible(false);
        }
      },
      {
        threshold: 0.2,
      }
    );

    if (ref.current) {
      observer.observe(ref.current);
    }

    return () => {
      if (ref.current) {
        observer.unobserve(ref.current);
      }
    };
  }, []);

  return (
    <motion.div
      ref={ref}
      initial={{
        opacity: 0,
        y: 60,
        rotateX: 10,
        scale: 0.95,
      }}
      animate={
        isVisible
          ? {
              opacity: 1,
              y: 0,
              rotateX: 0,
              scale: 1,
            }
          : direction === 'up'
          ? {
              opacity: 0,
              y: -50,
              rotateX: -10,
              scale: 0.95,
            }
          : {
              opacity: 0,
              y: 50,
              rotateX: 10,
              scale: 0.95,
            }
      }
      transition={{
        duration: 0.8,
        ease: [0.25, 0.46, 0.45, 0.94], // Cubic bezier easing for a more natural effect
        delay: 0.1,
      }}
      className={className}
      dangerouslySetInnerHTML={{ __html: content }}
    />
  );
};

export default AnimatedContent;
