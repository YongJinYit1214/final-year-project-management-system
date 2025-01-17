<!-- Feedback Form -->
<div class="action-panel">
    <div class="panel-header">
        <h3>Submit Feedback</h3>
    </div>
    <form id="feedbackForm" class="feedback-form">
        <div class="form-group">
            <label for="feedbackType">Type of Feedback</label>
            <select id="feedbackType" required>
                <option value="">Select type...</option>
                <option value="technical">Technical Support</option>
                <option value="system">System Issues</option>
                <option value="suggestion">Suggestions</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="feedbackSubject">Subject</label>
            <input type="text" id="feedbackSubject" required placeholder="Brief description of the issue">
        </div>
        <div class="form-group">
            <label for="feedbackDescription">Description</label>
            <textarea id="feedbackDescription" rows="4" required placeholder="Please provide detailed information..."></textarea>
        </div>
        <div class="form-group">
            <label for="feedbackPriority">Priority</label>
            <select id="feedbackPriority" required>
                <option value="low">Low</option>
                <option value="medium">Medium</option>
                <option value="high">High</option>
                <option value="urgent">Urgent</option>
            </select>
        </div>
        <div class="form-group">
            <label for="attachments">Attachments (optional)</label>
            <input type="file" id="attachments" multiple>
            <small>You can attach screenshots or relevant files</small>
        </div>
        <button type="submit" class="submit-btn">Submit Feedback</button>
    </form>
</div>