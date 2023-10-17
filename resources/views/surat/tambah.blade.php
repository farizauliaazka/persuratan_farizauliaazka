@extends('layout.layout')
@section('title', 'Tambah Surat')

@section('content')

                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
