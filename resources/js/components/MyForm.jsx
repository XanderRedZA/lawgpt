import React, { useState } from 'react';

function MyForm() {
  const [message, setMessage] = useState('');
  const [isSubmitting, setIsSubmitting] = useState(false);
  const [submissionError, setSubmissionError] = useState(null);
  const [submissionSuccess, setSubmissionSuccess] = useState(false);
  const [submissionResult, setSubmissionResult] = useState(null); // State to hold the result

  const handleSubmit = async (event) => {
    event.preventDefault();
    setIsSubmitting(true);
    setSubmissionError(null);
    setSubmissionSuccess(false);
    setSubmissionResult(null); // Clear previous result

    try {
      const response = await fetch('/api/form-submit', { // Laravel route
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'), // Get CSRF token
        },
        body: JSON.stringify({ message }),
      });

      if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Failed to submit form');
      }

      const result = await response.json();
      console.log(result); // Log the response from Laravel
      setSubmissionResult(result); // Store the result in state
      setSubmissionSuccess(true);
      setMessage('');

    } catch (error) {
      setSubmissionError(error.message);
    } finally {
      setIsSubmitting(false);
    }
  };

  return (
    <form onSubmit={handleSubmit}>
      <meta name="csrf-token" content={document.querySelector('meta[name="csrf-token"]').getAttribute('content')} />
      <div>
        <label htmlFor="message">Message:</label>
        <textarea
          id="message"
          value={message}
          onChange={(e) => setMessage(e.target.value)}
          required
        />
      </div>
      {isSubmitting && <p>Submitting...</p>}
      {submissionError && <p style={{ color: 'red' }}>Error: {submissionError}</p>}
      {submissionSuccess && <p style={{ color: 'green' }}>Form submitted successfully!</p>}
      {submissionResult && (
        <div style={{ marginTop: '10px', border: '1px solid #ccc', padding: '10px' }}>
          <h3>Submission Result:</h3>
          <pre>{JSON.stringify(submissionResult, null, 2)}</pre>
        </div>
      )}
      <button type="submit" disabled={isSubmitting}>Submit</button>
    </form>
  );
}

export default MyForm;
