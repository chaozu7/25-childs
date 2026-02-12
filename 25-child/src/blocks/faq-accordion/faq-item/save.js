export function SaveItem({ attributes }) {
    return (
        <div className="fz-faq-item">
            <button className="fz-faq-trigger">
                <span className="fz-faq-number"></span>
                <RichText.Content tagName="span" className="fz-faq-title" value={attributes.question} />
                <span className="fz-faq-icon">
                    {/* SVG PLUS ICON */}
                    <svg class="icon-plus" width="20" height="20" viewBox="0 0 20 20"><path d="M10 1v18M1 10h18" stroke="currentColor" stroke-width="2" fill="none" /></svg>
                    {/* SVG MINUS ICON */}
                    <svg class="icon-minus" width="20" height="20" viewBox="0 0 20 20" style="display:none"><path d="M1 10h18" stroke="currentColor" stroke-width="2" fill="none" /></svg>
                </span>
            </button>
            <div className="fz-faq-content" style={{ display: 'none' }}>
                <RichText.Content tagName="div" className="fz-faq-answer" value={attributes.answer} />
            </div>
        </div>
    );
}
