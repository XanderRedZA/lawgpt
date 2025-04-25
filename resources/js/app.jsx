import './bootstrap.js';
import React from 'react';
import ReactDOM from 'react-dom/client';
import MyForm from './components/MyForm.jsx'; // Ensure this is .jsx
const root = ReactDOM.createRoot(document.getElementById('root'));
console.log(root);
root.render(
  <React.StrictMode>
    <MyForm />
  </React.StrictMode>
);
