/**
 * WordPress dependencies
 */
import { InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
} from '@wordpress/components';

/**
 * Internal dependencies
 */
import FieldInspectorControls from './components/FieldInspectorControls';
import BlockPreview from './components/BlockPreview';

/**
 * Creates the 'edit' component for a given block specification.
 *
 * @param {Object} block   Block specification (TBD).
 * @param {Object} context Block context (TBD).
 */
const createBlockEditComponent = ( block, context ) => ( props ) => {
	const {
		fields = [],
		blockName,
		blockGroupLabel,
	} = block;

	const {
		className,
		attributes = {},
		setAttributes,
	} = props;

	return (
		<div className={ className }>
			<InspectorControls>
				<PanelBody
					title={ blockGroupLabel }
					key={ blockName }
				>
					<FieldInspectorControls
						fields={ fields }
						attributes={ attributes }
						setAttributes={ setAttributes }
					/>
				</PanelBody>
			</InspectorControls>
			<BlockPreview
				block={ block }
				attributes={ attributes }
				context={ context }
			/>
		</div>
	);
};

export default createBlockEditComponent;
