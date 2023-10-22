import React from 'react';
import { createRoot } from 'react-dom/client';
import { Editor } from './src/Editor';

const container = document.getElementById('app');
const root = createRoot(container);

root.render(<Editor />);