import React from 'react';
import PropTypes from 'prop-types';

import BaseInput from 'dfv/src/fields/base-input';
import { FIELD_PROP_TYPE_SHAPE } from 'dfv/src/config/prop-types';

const Text = ( props ) => {
	const { fieldConfig = {} } = props;

	const {
		text_max_length: maxLength,
		text_placeholder: placeholder,
	} = fieldConfig;

	return (
		<BaseInput
			{ ...props }
			type="text"
			maxLength={ maxLength ? parseInt( maxLength, 10 ) : undefined }
			placeholder={ placeholder }
		/>
	);
};

Text.propTypes = {
	fieldConfig: FIELD_PROP_TYPE_SHAPE,
	setValue: PropTypes.func.isRequired,
	value: PropTypes.string,
};

export default Text;
