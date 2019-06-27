/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 */

import { Editor } from 'tinymce/core/api/Editor';
import { WordCount } from '../text/WordCount';

const fireWordCountUpdate = (editor: Editor, wordCount: WordCount) => {
  editor.fire('wordCountUpdate', { wordCount });
};

export {
  fireWordCountUpdate
};