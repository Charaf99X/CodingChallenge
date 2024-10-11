import React from 'react';

const Pagination = ({ currentPage, totalPages, onPageChange }) => {
    return (
        <div>
            {Array.from({ length: totalPages }, (_, i) => i + 1).map(page => (
                <button 
                    key={page} 
                    onClick={() => onPageChange(page)}
                    disabled={currentPage === page}
                >
                    {page}
                </button>
            ))}
        </div>
    );
};

export default Pagination;
