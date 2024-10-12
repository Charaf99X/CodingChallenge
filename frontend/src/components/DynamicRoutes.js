import React, { useEffect, useState, useMemo } from 'react';
import { Routes, Route } from 'react-router-dom';

import ProductList from './ProductList';
import ProductForm from './ProductForm';
import CategoryFilter from './CategoryFilter';

const componentMap = {
  'api/products': ProductList,
  'api/products/create': ProductForm,
  'api/categories': CategoryFilter,
};

const DynamicRoutes = () => {
    const [routes, setRoutes] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);

    const fetchRoutes = async () => {
        try {
            const response = await fetch('http://localhost:8000/api/routes');
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            setRoutes(data);
        } catch (e) {
            setError(e.message);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        fetchRoutes();
    }, []);

    const cachedRoutes = useMemo(() => routes, [routes]);

    if (loading) return <div>Loading...</div>;
    if (error) return <div>Error loading routes: {error}</div>;

    return (
        <Routes>
            {cachedRoutes.map((route, index) => {
                const Component = componentMap[route.uri] || (() => <h2>{route.uri}</h2>);
                return (
                    <Route
                        key={index}
                        path={`/${route.uri}`}
                        element={<Component />}
                    />
                );
            })}
        </Routes>
    );
};

export default DynamicRoutes;
