import React, { Fragment } from 'react';

// Add the CSS
import './style.css';

// Get translation functions
const { __ } = wp.i18n;

// Get built in editor components
const {
	RichText,
	InspectorControls,
	BlockControls,
} = wp.editor;

export const name = 'paradowski-blocks/block';

export const settings = {

	// The title shown in the block picker
	title: __( 'Example Block', 'paradowski-blocks' ),

	// A more detailed description
	description: __( 'Example block description', 'paradowski-blocks' ),

	// The icon, from the list of dashicons or material UI icons
	// https://material.io/tools/icons/
	// icon: 'widget',

	// The category is the section of the block picker where this shows
	category: 'paradowski',

	// Keywords help users search for & find a block
	keywords: [
		__( 'custom block', 'paradowski-blocks' ),
	],

	// Attributes define the data sources for the block
	attributes: {
		title: {
			type: 'string',
			source: 'html',
			selector: 'h2',
		},
		description: {
			type: 'string',
			source: 'html',
			selector: 'p',
		},
	},

// The block in edit mode
edit( { className, attributes, setAttributes } ) {
	const { title, description } = attributes;

	return (
		<Fragment>
			<BlockControls>
				I appear inline with the block itself 😎
			</BlockControls>
			<InspectorControls>
				<p>I'm in the block settings sidebar 🧐</p>
			</InspectorControls>
			<div className={`pc-block ${className}`}>
				<RichText
					tagName="h2"
					value={ title }
					onChange={ ( title ) => setAttributes( { title } ) }
				/>
				<RichText
					tagName="p"
					multiline={ true }
					value={ description }
					onChange={ ( description ) => setAttributes( { description } ) }
				/>
			</div>
		</Fragment>
	);
},

	// The output to save to the post content
	save( { className, attributes } ) {
		const { title, description } = attributes;

		return <div className={`pc-block ${className}`}>
			<RichText.Content tagName="h2" value={ title } />
			<RichText.Content tagName="p" multiline={ true } value={ description } />
		</div>;
	},

};
